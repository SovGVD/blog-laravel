<template>
	<nav aria-label="Page navigation">
		<ul class="pagination" v-if="pages.length > 1">
			<li v-for="page in pages" class="page-item" :class="{ active: isCurrent(page) }">
				<router-link class="page-link" :to="page.url">{{ page.num }}</router-link>
			</li>
		</ul>
	</nav>
</template>

<script>
	export default {
		name: 'pagination',
		
		props: ['config'],

		data () {
		return {
				path: "/",
				pages: []
			}
		},
		
		mounted() {
			this.init();
		},
		
		methods: {
			init: function () {
				for (var i = 1, i_max = this.totalPages(); i <= i_max; i++ ) {
					this.pages.push({ num: i, url: this.pageUrl(i)});
				}
			},
			
			totalPages: function () {
				if (this.config.per_page > 0) {
					return Math.ceil(this.config.total/this.config.per_page);
				}
				return 0;
			},
			
			pageUrl: function (page_num) {
				return this.path + page_num;
			},
			
			isCurrent: function(page) {
				return page.num == this.config.current_page;
			}
		}
	}
</script>

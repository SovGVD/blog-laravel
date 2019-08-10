<template>
	<nav aria-label="breadcrumb">
		<ol class="breadcrumb">
			<li v-for="(item, index) in items" class="breadcrumb-item" :class="{ active : isLast(index) }">
				<span v-if="isLast(index)">{{ item.title }}</span>
				<router-link v-else :to=item.url>{{ item.title }}</router-link>
			</li>
		</ol>
	</nav>
</template>

<script>
	export default {
		name: 'breadcrumbs',
		
		props: ['item'],

		data () {
		return {
				home: { url: "/", title: "Home" },
				items: false
			}
		},
		
		mounted() {
			this.initItems();
		},
		
		methods: {
			initItems: function() {
				this.items = [ this.home ];
				this.items.push(this.item);
			},
			
			isLast: function(index) {
				return index == this.items.length-1;
			}
		}
	}
</script>

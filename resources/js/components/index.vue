<template>
	<div>
		<breadcrumbs></breadcrumbs>
		<post-item v-if="posts !== false" v-for="post in posts" :post="post">
		</post-item>
	</div>
</template>

<script>
	import breadcrumbs from './breadcrumbs';
	import PostItem from './postitem';
	
	export default {
		name: 'Index',
		
		props: ['page'],
		
		components: { breadcrumbs, PostItem },

		data () {
		return {
				posts: false,
				pagination: {
					per_page: null,
					total: null,
					current_page: null
				}
			}
		},
		
		mounted() {
			this.fetchPosts();
		},
		
		methods: {
			fetchPosts: function () {
				this.$http.get("/api/v1/post/")
					.then(response => {
						this.posts = response.data.message.data;
						
						this.pagination.per_page = response.data.message.per_page;
						this.pagination.total = response.data.message.total;
						this.pagination.current_page = response.data.message.current_page;
						
						console.log("POSTS", response.data.message);
					})
					.catch(error => {
						console.log("ERROR", error);
					});
			}
		}
	}
</script>

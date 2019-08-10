<template>
	<div>
		<breadcrumbs></breadcrumbs>
		<post-item v-if="posts !== false" v-for="post in posts" :post="post" v-bind:key="post._id"></post-item>
		<pagination v-if="posts !== false" :config="pagination_meta"></pagination>
	</div>
</template>

<script>
	import breadcrumbs from './items/breadcrumbs';
	import PostItem from './items/postitem';
	import pagination from './items/pagination';
	
	export default {
		name: 'Index',
		
		props: ['page'],
		
		components: { breadcrumbs, PostItem, pagination },

		data () {
			return {
				posts: false,
				pagination_meta: {
					per_page: null,
					total: null,
					current_page: null
				}
			}
		},
		
		watch: {
			'$route': 'fetchPosts'
		},
		
		created() {
			this.fetchPosts();
		},
		
		methods: {
			fetchPosts: function () {
				this.$http.get("/api/v1/post/?page=" + this.page)
					.then(response => {
						this.posts = response.data.message.data;
						
						this.pagination_meta.per_page = response.data.message.per_page;
						this.pagination_meta.total = response.data.message.total;
						this.pagination_meta.current_page = response.data.message.current_page;
						
						console.log("POSTS", response.data.message);
					})
					.catch(error => {
						console.log("ERROR", error);
					});
			}
		}
	}
</script>

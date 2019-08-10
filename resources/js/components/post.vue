<template>
	<div>
		<breadcrumbs :item=bcitem></breadcrumbs>
		<post-item v-if="post !== false" :post="post">
		</post-item>
	</div>
</template>

<script>
	import breadcrumbs from './breadcrumbs';
	import PostItem from './postitem';
	
	export default {
		name: 'Post',
		
		props: ['id'],
		
		components: { breadcrumbs, PostItem },
		
		data () {
			return {
				post: false,
				bcitem: { url: "", title: "" }
			}
		},
		
		mounted() {
			this.fetchPost();
		},
		
		methods: {
			content: function () {
				return this.$md.render(this.post.content);
			},
			
			fetchPost: function () {
				this.$http.get("/api/v1/post/" + this.id)
					.then(response => {
						this.post = response.data.message;
						this.bcitem.title = this.post.title;
						console.log("POST", this.post);
					})
					.catch(error => {
						console.log("ERROR", error);
					});
			}
		}
	}
</script>

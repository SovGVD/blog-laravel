<template>
	<div>
		<div class="card" v-if="post !== false">
			<div class="card-body">
				<h2>{{ post.title }}</h2>
				<div v-html="content()"></div>
			</div>
			<div class="card-footer text-muted">
				<div class="row">
					<div class="col-sm">
						{{ post.author_name }} at {{ post.published_ts }}
					</div>
					<div class="col-sm">
						{{ post.tags }}
					</div>
				</div>
			</div>
		</div>
	</div>
</template>

<script>
	export default {
		name: 'Post',
		
		props: ['id'],
		
		data () {
			return {
				post: false
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
						console.log("POST", this.post);
					})
					.catch(error => {
						console.log("ERROR", error);
					});
			}
		}
	}
</script>

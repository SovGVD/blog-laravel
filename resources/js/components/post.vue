<template>
	<div>
		<breadcrumbs :item=bcitem></breadcrumbs>
		<div class="card" v-if="post !== false">
			<div class="card-header">
				<h2>{{ post.title }}</h2>
			</div>
			<div class="card-body" v-html="content()">
			</div>
			<div class="card-footer text-muted">
				<div class="row">
					<div class="col-sm">
						{{ post.published_ts | moment("MMMM Do, YYYY") }} by {{ post.author_name }}
					</div>
					<div class="col-sm text-right">
						{{ post.tags }}
					</div>
				</div>
			</div>
		</div>
	</div>
</template>

<script>
	import breadcrumbs from './breadcrumbs';
	export default {
		name: 'Post',
		
		props: ['id'],
		
		components: { breadcrumbs },
		
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

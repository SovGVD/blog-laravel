<template>
	<div class="card mb-4">
		<div class="card-header">
			<h2 v-if="full">{{ post.title }}</h2>
			<router-link v-else :to=postUrl()>{{ post.title }}</router-link>
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
</template>

<script>
	export default {
		name: 'PostItem',
		
		props: ['post'],
		
		data () {
		return {
				full: false
			}
		},
		
		mounted() {
			this.init();
		},
		
		methods: {
			init: function () {
				if (this.post.content) {
					this.full = true;
				}
			},
			
			postUrl: function () {
				return "/post/" + this.post._id;
			},
			
			content: function() {
				return this.$md.render(this.full?this.post.content:this.post.intro);
			}
		}
	}
</script>

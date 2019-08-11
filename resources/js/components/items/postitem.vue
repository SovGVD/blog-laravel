<template>
	<div class="card mb-4">
		<div class="card-header">
			<h2 v-if="full">{{ post.title }}</h2>
			<router-link v-else :to="postUrl()">{{ post.title }}</router-link>
		</div>
		<div class="card-body" v-html="content()">
		</div>
		<div class="card-footer text-muted">
			<div class="row">
				<div class="col-sm">
					{{ post.published_ts | moment("MMMM Do, YYYY") }} by {{ post.author_name }}
				</div>
				<div class="col-sm text-right">
					<tags-line :tags=post.tags></tags-line>
				</div>
			</div>
		</div>
	</div>
</template>

<script>
	import TagsLine from './tagsline';
	
	export default {
		name: 'PostItem',
		
		props: ['post'],
		
		components: { TagsLine },
		
		data () {
		return {
				full: false,
				path: "/post/",
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
				return this.path + this.post._id;
			},
			
			content: function() {
				return this.$md.render(this.full?this.post.content:this.post.intro);
			}
		}
	}
</script>

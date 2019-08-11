<template>
	<span>
		<span v-for="(tag, index) in displayTags">
			<router-link :to="tagUrl(tag)">{{ tag }}</router-link>{{ displaySeparator(index) }}
		</span>
	</span>
</template>

<script>
	export default {
		name: 'TagsLine',
		
		props: ['tags'],

		data () {
		return {
				path: '/tag/',
				separator: ', ',
				displayTags: []
			}
		},
		
		created() {
			this.initTags();
		},
		
		methods: {
			initTags: function () {
				if (typeof this.tags == 'string') {
					// Fallback for previous version of tags-as-string
					if (this.tags.indexOf(",") > -1) {
						this.displayTags = this.tags.split(",").map(function(tag) { return tag.trim(); });
					} else {
						this.displayTags = [this.tags];
					}
				} else {
					this.displayTags = this.tags;
				}
			},
			
			tagUrl: function(tag) {
				return this.path+tag;
			},
			
			displaySeparator: function (index) {
				return index == this.displayTags.length-1?'':this.separator;
			}
		}
	}
</script>

<template>
	<div class="side-note" :class="hideClass">
		<div class="dismiss" @click="show = false">
			<i class="fa fa-times"></i>
		</div>
		Note: We only serve Penang customers for now, by continuing to use our website, you agree that you are fully aware of this note.
	</div>
</template>

<script>
	export default {
		props: ['default'],
		data() {
			return {
				show: this.default
			};
		},

		computed: {
			hideClass() {
				return this.show ? "" : "side-note-hidden";
			}
		}	
	}
</script>
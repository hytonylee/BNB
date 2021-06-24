<template>
    <div>
        <div v-if="loading"></div>
        <div v-else>
            <div v-if="alreadyReviewed">
                <h3>You've already reviewd this booking!!</h3>
            </div>
            <div v-else>
                <div class="form-group">
                    <label class="text-muted">Select the star rating: </label>
                    <star-rating   star-rating class="fa-2x" v-model="review.rating"></star-rating>
                </div>
                <div class="form-group">
                    <label for="content" class="text-muted">Share your experience:</label>
                    <textarea name="content" class="form-control" cols="30" rows="10" v-model="review.content"></textarea>
                </div>
                <button class="btn btn-lg btn-primary btn-block">Submit</button>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    // methods: {
    //     onRatingChanged(rating) {
    //         console.log(rating);
    //     }
    // }
    data() {
        return {
            review: {
                rating: 5,
                content: null
            },
            existingReview: null,
            loading: false,
        }
    },
    created() {
        loading = true
        // 1. check if review already exists (in review table by id)
        axios
            .get(`/api/reviews/${this.$route.params.id}`)
            .then(response => (this.existingReview = response.data.data))
            .catch(error => {
                console.log(error);
            }).then(() =>(this.loading = false));
        // 2. fetch a booking by a review key
        // 3. store the review
    },
    computed: {
        alreadyReviewed() {
            return this.existingReview !== null;
        }
    }
}

</script>

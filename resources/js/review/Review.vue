<template>
    <div>
        <div class="form-group">
            <label class="text-muted">Select the star rating: </label>
            <star-rating class="fa-2x" v-model="review.rating"></star-rating>
        </div>
        <div class="form-group">
            <label for="content" class="text-muted">Share your experience:</label>
            <textarea name="content" class="form-control" cols="30" rows="10" v-model="review.content"></textarea>
        </div>

        <button
            class="btn btn-lg btn-primary btn-block"
        >
            Submit
        </button>
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
            }
        }
    },
    created() {
        // 1. check if review already exists (in review table by id)
        // 2. fetch a booking by a review key
        // 3. store the review
    }
}

</script>

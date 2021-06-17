<template>
    <div class="d-flex">
        <i class="fas fa-star" v-for="(star, index) in fullStars" :key="'full'+index"></i>
        <i class="fas fa-star-half-alt" v-if="halfStar"></i>
        <i class="far fa-star" v-for="(star, index) in emptyStars" :key="'empty'+index"></i>
    </div>
</template>


<script>
    export default {
        props: {
            rating: Number
        },
        computed: {
            halfStar() {
                return false;
            },
            fullStars() {
                return 4;
            },
            emptyStars() {
                return 1;
            }
        }

    }
</script>

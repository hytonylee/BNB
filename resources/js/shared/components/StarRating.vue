<template>
    <div class="d-flex">
        <i  class="fas fa-star"
            v-for="(star, index) in fullStars" :key="'full'+index"
            @click="$emit('input', star)"
        ></i>
        <i class="fas fa-star-half-alt"
           v-if="halfStar"
           @click="$emit('input', halfStar)"
        ></i>
        <i class="far fa-star"
           v-for="(star, index) in emptyStars" :key="'empty'+index"
           @click="$emit('input', fullStars + star)"
        ></i>
    </div>
</template>


<script>
    export default {
        props: {
            value: Number
        },
        computed: {
            halfStar() {
                const fraction = Math.round((this.value - Math.floor(this.value))*100);
                // console.log(fraction);
                return fraction > 0 && fraction < 50;
            },
            fullStars() {
                // >4.5 = 5
                // 4.3 = 4
                return Math.round(this.value);
            },
            emptyStars() {
                // if value = 1.9, ceil(1.9) = 2, 5-2=3, render 3 empty stars
                return 5 - Math.ceil(this.value);
            }
        },
        // created() {
        //     const numbers = [0.9, 4.2, 1.3, 4.5, 3.2, 4.9];

        //     numbers.forEach(n => {
        //         console.log(`round for ${n} is ${Math.round(n)}`);
        //         console.log(`floor for ${n} is ${Math.floor(n)}`);
        //         console.log(`ceil for ${n} is ${Math.ceil(n)}`);
        //         console.log(`=================================`);

        //     })
        // }

    }
</script>

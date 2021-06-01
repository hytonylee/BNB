<template>
    <div>
        <div class="card mb-4 p-4">
            <h1>{{ itemTitle }}</h1>
            <p>{{ itemContent }}</p>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        'itemTitle': String,
        'itemContent': String,
        'price': Number
        },
    mounted() {
        console.log(this.itemTitle);

        // setTimeout(() => {
        //     this.itemTitle = "New Title"
        // }, 6000)

        // modifying prop is a bad idea.
        // this.itemTitle = "New Title";
    }
}
</script>

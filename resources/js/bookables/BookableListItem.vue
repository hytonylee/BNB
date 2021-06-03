<template>
    <div class="card mb-4 w-100">
        <div class="card-body">
            <h5 class="card-title">{{ itemTitle }}</h5>
            <p class="card-text">{{itemDescription}}</p>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        'itemTitle': String,
        'itemDescription': String,
        'price': Number
        },
}
</script>

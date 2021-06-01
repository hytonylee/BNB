<template>
    <div>
        <div
            v-if="loading"
        >Data is Loading</div>
        <div v-else>
             <bookable-list-item
                :item-title="bookable.title"
                :item-content="bookable.content"
                :price="13324"
                v-for="(bookable, index) in bookables"
                :key="index"
            ></bookable-list-item>
        </div>
    </div>
</template>


<script>
import BookableListItem from './BookableListItem';

export default {
    components: {
        BookableListItem
    },
    data() {
        return {
            bookables: null,
            loading: false
        }
    },
    // beforeCreate() {
    //     console.log('before create');
    // },
    created() {
        this.loading = true;
        console.log("created");

        setTimeout(() => {
            this.bookables = [{
                title: "Random Title1",
                content: "Something something1"
            },
            {
                title: "Random Title2",
                content: "Something something2"
            }];
            this.loading = false;
        }, 2000);
    },
}
</script>

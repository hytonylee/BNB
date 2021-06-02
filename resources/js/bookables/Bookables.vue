<template>
    <div>
        <div v-if="loading">Data is Loading</div>
        <div v-else>
            <div class="row" v-for="row in rows" :key="'row'+ row">
                <div
                    class="col"
                    v-for="(bookable, column) in bookablesInRow(row)"
                    :key =" 'row' + row + column"
                >
                    <bookable-list-item
                        :item-title="bookable.title"
                        :item-content="bookable.content"
                        :price="13324"
                    ></bookable-list-item>
                </div>
                <div class="col" v-for="p in placeholderInRow(row)" :key="'placeholder' + row + p"></div>
            </div>
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
            loading: false,
            columns: 3
        }
    },
    // beforeCreate() {
    //     console.log('before create');
    // },
    computed: {
        rows() {
            return this.bookables === null ? 0 : Math.ceil(this.bookables.length / this.columns);
        }
    },
    methods: {
        bookablesInRow(row) {
           return this.bookables.slice((row - 1) * this.columns, row * this.columns)
        },
        placeholderInRow(row){
            return this.columns - this.bookablesInRow(row).length;
        }
    },
    created() {
        this.loading = true;

        setTimeout(() => {
            this.bookables = [{
                title: "Random Title1",
                content: "Something something1"
            },
            {
                title: "Random Title2",
                content: "Something something2"
            },
            {
                title: "Random Title3",
                content: "Something something3"
            },
            {
                title: "Random Title4",
                content: "Something something4"
            },
            {
                title: "Random Title5",
                content: "Something somethin5"
            },
            {
                title: "Random Title6",
                content: "Something something6"
            },
            {
                title: "Random Title7",
                content: "Something something7"
            },
            ];
            this.loading = false;
        }, 2000);
    },
}
</script>

<template>
    <div>
        <div v-if="loading">Data is Loading</div>
        <div v-else>
            <div class="row" v-for="row in rows" :key="'row'+ row">
                <div
                    class="col d-flex align-item-stretch"
                    v-for="(bookable, column) in bookablesInRow(row)"
                    :key =" 'row' + row + column"
                >
                    <bookable-list-item
                        v-bind="bookable"
                    ></bookable-list-item>
                    <!-- <bookable-list-item
                        :title="bookable.title"
                        :description="bookable.description"
                        :id="bookable.id"
                    ></bookable-list-item> -->
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

        const p = new Promise((resolve, reject) => {
            console.log(resolve);
            console.log(reject);
            setTimeout(() => resolve("hello"),3000);
        }).then(result=> console.log(`Success ${result}`))
          .catch(error=>console.log(`Error ${error}`));

        console.log(p);

        const request = axios
            .get('/api/bookables')
            .then(res => {
                this.bookables = res.data;
                this.loading = false;
            });

    },
}
</script>

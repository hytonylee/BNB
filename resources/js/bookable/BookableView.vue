<template>
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <div v-if="!loading">
                        <h2>{{bookable.title}}</h2>
                        <hr />
                        <article>
                            {{bookable.description}}
                        </article>
                    </div>
                    <div v-else>
                        data is loading...
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            Availablity & Price
        </div>
    </div>
</template>


<script>
export default {
    data() {
        return {
            loading: false,
            bookable: null
        }
    },
    created() {
        this.loading = true;
        axios.get(`/api/bookables/${this.$route.params.id}`)
        .then(res => {
            this.bookable = res.data;
            this.loading = false;
        })
    }
}
</script>

<template>
    <div class="row">
        <div class="col-md-8 pb-4">
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
            <review-list :bookable-id="this.$route.params.id"></review-list>
        </div>
        <div class="col-md-4 pb-4">
            <availability :bookable-id="this.$route.params.id"></availability>
        </div>
    </div>
</template>


<script>
import Availability from './Availability';
import ReviewList from './ReviewList';

export default {
    components: {
        Availability, ReviewList
    },
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
            this.bookable = res.data.data;
            this.loading = false;
        })
    }
}
</script>

<template>
    <div>
        <div class="form-group">
            <label class="text-muted">Select the star rating: </label>
            <star-rating :rating="5" class="fa-2x"></star-rating>
        </div>
        <div class="form-group">
            <label for="content" class="text-muted">Share your experience:</label>
            <textarea name="content" class="form-control" cols="30" rows="10"></textarea>
        </div>

        <button class="btn btn-lg btn-primary btn-block">Submit</button>
    </div>
</template>

<script>

</script>

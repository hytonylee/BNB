<template>
    <div>
        <bookable-list-item item-title="Random Title" item-content="Random Content is in here." :price="13324"></bookable-list-item>
        <bookable-list-item item-title="Random Title 2" item-content="Random Content is in here 2." :price="234"></bookable-list-item>
    </div>
</template>


<script>
import BookableListItem from './BookableListItem';

export default {
    components: {
        BookableListItem
    }
}
</script>

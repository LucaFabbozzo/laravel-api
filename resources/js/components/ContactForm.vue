<script>
import axios from 'axios';
import { BASE_URL } from '../data/data'

export default {
    name: 'ContactForm',

}
</script>

<template>
    <form>
        <div>
            <input type="text" placeholder="Name">
        </div>
        <div>
            <input type="text" placeholder="Email">
        </div>
        <div>
            <input type="text" placeholder="Object">
        </div>
        <div>
           <textarea name="" id="" cols="30" placeholder="Message" rows="10"></textarea>
        </div>
        <button>Send</button>
    </form>

</template>


<style lang="scss" scoped>
    div {
        padding-bottom: 20px;
    }
    .is-invalid {
        border: 1px solid red;
    }
    .error {
        font-size: 0.8rem;
        color: red;
        margin: 0;
    }

</style>

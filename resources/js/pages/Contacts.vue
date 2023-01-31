<script>
import ContactForm from '../components/ContactForm.vue';
export default {
    name: 'Contacts',
    components: {
        ContactForm
    }
}
</script>

<template>
    <h1>Contacts</h1>
    <h3>For any information please contact me:</h3>
    <ContactForm />
</template>


<style lang="scss" scoped>
    h3 {
        text-align: center;
        padding-bottom: 30px;
        color: #616161;
        font-weight: lighter;
    }
</style>

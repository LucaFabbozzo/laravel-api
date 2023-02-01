<script>
  export default {
        name: 'Header',
    }
</script>

<template>
    <header>
        <ul>
            <li><router-link :to="{ name: 'home' }">home</router-link></li>
            <li><router-link :to="{ name: 'projects' }">projects</router-link></li>
            <li><router-link :to="{ name: 'about' }">about</router-link></li>
            <li><router-link :to="{ name: 'contacts' }">contacts</router-link></li>
        </ul>
    </header>

</template>


<style lang="scss" scoped>
@use '../../scss/partials/vars' as *;
header {
        ul {
            text-align: center;
            margin-top: 20px;
            li {
                display: inline-block;
                text-transform: uppercase;
                font-weight: bolder;
                padding: 20px;
                font-size: 1.1rem;
                a {
                    text-decoration: none;
                    color: #7b7b7b;
                    &:hover,
                    &.active {
                        color: $tertiary-color;
                    }
                }
            }
        }
    }
</style>

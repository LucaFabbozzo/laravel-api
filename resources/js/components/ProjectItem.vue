<script>
export default {
    name: 'ProjectItem',
    props: {
        project: Object
    },
    data() {
        return {

        }
    },

}
</script>

<template>
    <div class="projects-box">
        <h3>
        <router-link :to="{name: 'detail', params:{slug: project.slug} }">{{project.name}}</router-link>
        </h3>
        <p>{{ project.summary }}</p>
        <h4 v-if="project.type">Type: {{ project.type.name }}</h4>
        <div class="technology" v-if="project.technologies.length">
            <span v-for="technology in project.technologies" :key="'technology' + technology.id">{{ technology.name }}</span>
        </div>
    </div>
</template>


<style lang="scss" scoped>
@use '../../scss/partials/vars' as *;
.projects-box {
        padding-bottom: 30px;
        h3 {
            padding-bottom: 10px;
            a {
                color: $secondary-color;
            }
        }
        p {
            padding-bottom: 10px
        }

        h4 {
            padding-bottom: 10px;
        }
        span {
            margin: 2px;
            display: inline-block;
            background-color: lightgray;
            padding: 4px 10px;
            border-radius: 5px;
            color: black;
        }
    }
</style>

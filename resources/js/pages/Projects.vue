<script>
import axios from 'axios';
import { BASE_URL } from '../data/data';
import { store } from '../data/store';
import ProjectItem from '../components/ProjectItem.vue'
import FormSearch from '../components/FormSearch.vue'
export default {
    name: 'Projects',
    data() {
        return {
            BASE_URL,
            store,
            active_base_url: BASE_URL + 'projects'
        }
    },
    components: { ProjectItem, FormSearch },
    methods: {
        getApi(url) {

            axios.get(url)
                .then(result => {
                    store.projects = result.data.projects.data;
                    store.links = result.data.projects.links;
                    console.log(store.links);
                })
        },
    },
    mounted() {
        this.getApi(this.active_base_url);
    }
}
</script>

<template>

    <FormSearch />

    <ProjectItem v-for="project in store.projects" :key="project.id" :project="project"/>

    <div class="paginate">

        <button
            v-for="link in store.links" :key="link.label"
            :disabled="link.active || !link.url"
            @click="getApi(link.url)"
            v-html="link.label"></button>

     </div>

</template>


<style lang="scss">
    h1 {
        padding-bottom: 40px;
        text-transform: uppercase;
        font-size: 1.5rem;
        text-align: center;
    }
    .paginate {
        text-align: center;
        button {
            padding: 5px 8px;
            margin: 2px;
        }
    }
</style>

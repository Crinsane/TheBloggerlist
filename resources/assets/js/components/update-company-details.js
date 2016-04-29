Vue.component('update-company-details', {
    props: ['user'],

    data() {
        return {
            name: '',
            website: '',
            description: '',
            updating: false
        }
    },

    ready() {
        this.$http.get('/company')
            .then(response => {
                this.name = response.data.name;
                this.website = response.data.website;
                this.description = response.data.description;
            });
    },

    methods: {
        update() {
            this.updating = true;

            this.$http.put('/company', { name: this.name, website: this.website, description: this.description })
                .then(response => {
                    this.updating = false;
                });
        }
    }
});

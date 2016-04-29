Vue.component('create-project', {
    props: ['user'],

    data() {
        return {
            title: '',
            description: '',
            bloggers: '',
            start: '',
            end: '',
            priority: false,
            storing: false
        }
    },

    ready() {
        $('#summernote').summernote({
            disableDragAndDrop: true,
            toolbar: [
                ['style', ['bold', 'italic', 'underline', 'clear']],
                ['fontsize', ['fontsize']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['height', ['height']]
            ],
            callbacks: {
                onBlur: function() {
                    var contents = $('#summernote').summernote('code');
                    this.description = contents;
                }.bind(this)
            }
        });

        // $('.i-checks').iCheck({
        //     checkboxClass: 'icheckbox_square-green',
        //     radioClass: 'iradio_square-green'
        // }).on('ifChanged', function(e){
        //     console.log(e, this);
        // }.bind(this));

        $('.input-daterange').datepicker({
            format: 'yyyy-mm-dd'
        });
    },

    methods: {
        store() {
            this.storing = true;

            this.$http.post('/projects', { title: this.title, description: this.description, bloggers: this.bloggers, start: this.start, end: this.end, priority: this.priority })
                .then(response => {
                    this.storing = false;
                })
                .catch(response => {
                    this.storing = false;

                    if(response.status == 403) return toastr.error('You are not permitted to create a new project.');
                    if(response.status == 422) return toastr.error('Not all required fields are properly filled.');
                });
        }
    }
});

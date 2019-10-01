import Pagination from "../components/Pagination.vue";
import Search from "../mixins/search";
Vue.component('pages', {
    components: {Pagination},

    mixins: [Search],
    props: {
        search_path: {
            type: [String, Number],
        },
    },
    data: function () {
        return {
            items: [],
            pagination: {},
            currentUser: {},
        }
    },
    created: function() {
        this.pagination = this.setPagination()
    },
    mounted() {
        this.formSubmitAction()
    },
    methods: {
        showUser(user) {
            this.currentUser = user
            $('#show-modal').modal()
        }
    }
});
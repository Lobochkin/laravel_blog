<template>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>
                            Наименование
                        </th>
                        <th>
                            URL
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-for="url in urlData">
                        <td>{{ url.title }}</td>
                        <td>{{ url.url }}</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</template>

<script>

export default {
    props: [
        'urlData'
    ],
    mounted() {
        this.update();
    },
    methods: {
        update() {
            console.log(this.urlData);
        }
    }
};
</script>

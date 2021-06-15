var vm = new Vue({
    el: document.querySelector('#mount'),
    data: {
        posts: []
    },
    methods: {
        fetchPosts: function() {
            var url = '/wp-json/wp/v2/posts?filter[orderby]=date';
            fetch(url).then((response)=>{
                return response.json()
            }).then((data)=>{
                this.posts = data;
            });
        }
    },
    template: `<div><h3>My Latest Posts Widget</h3>
        <div>
            <p v-for="post in posts">
                <a v-bind:href="post.link">{{post.title.rendered}}</span></a>
            </p>
        </div>
    </div>`,
    mounted: function(){
        console.log("Hello Vue!");
        this.fetchPosts();
    }
});
<template>
    <header>
        <div class="header-top">
            <RouterLink :to="{ name: 'index' }" class="logo">SKEYS</RouterLink>
            <div class="search">
                <input id="search"
                       type="text"
                       v-model="searchValue"
                       class="input-text algolia-search-input"
                       autocomplete="off"
                       spellcheck="false"
                       autocapitalize="off"
                       placeholder="Search website">
                <div class="actions">
                    <span id="search-glass">
                        <img src="../../images/icons/search-glass.svg" alt="icon">
                    </span>
                </div>
                <ul ref="searchList" class="search-list">
                    {{ searchResult }}
                </ul>
            </div>
            <nav class="nav-top">
                <ul>
                    <li>
                        <div class="wishlist">
                            <a href="#">
                                <img src="../../images/icons/wishlist.svg" width="39" height="42" alt="wishlist">
                                <img class="header-link-hover" src="../../images/icons/wishlist.svg" width="39"
                                     height="42" alt="wishlist">
                            </a>
                        </div>
                    </li>
                    <li>
                        <div class="account">
                            <a href="#">
                                <img src="../../images/icons/account.svg" width="39" height="42" alt="account">
                                <img class="header-link-hover" src="../../images/icons/account.svg" width="39"
                                     height="42" alt="account">
                            </a>
                        </div>
                    </li>
                    <li>
                        <div class="cart">
                            <a href="#">
                                <img src="../../images/icons/cart.svg" width="39" height="42" alt="cart">
                                <img class="header-link-hover" src="../../images/icons/cart.svg" width="39" height="42"
                                     alt="cart">
                            </a>
                        </div>
                    </li>
                </ul>
            </nav>
        </div>
        <div class="header-bottom">
            <nav>
                <ul v-if="categories">
                    <li v-for="category in categories" :key="category.id">
                        <RouterLink :to="{ name:'categories.item', params: { id: category.id } }">
                            {{ category.title }}
                        </RouterLink>
                    </li>
                </ul>
            </nav>
        </div>
    </header>
</template>

<script>
export default {
    name: "HeaderComponent",
    data(){
        return {
            searchValue: null,
        }
    },
    watch: {
        searchValue (to, from){
            this.handleInput(to)
        }
    },
    mounted() {
        this.$store.dispatch('getCategories')
    },
    methods: {
        handleInput(text){
            console.log('handleInput')
            if (text !== '' && text.length > 2){
                this.$store.dispatch('getSearchResult', text)
                this.$refs.searchList.style.display = 'flex'
            } else {
                this.$refs.searchList.style.display = 'none'
            }
        },

    },
    computed: {
        searchResult(){ return this.$store.getters.searchResult },
        categories(){ return this.$store.getters.categories }
    }
}
</script>

<style lang="scss" scoped>
header {
    padding: 10px 0 0;
    .header-top {
        display: flex;
        justify-content: space-between;
        align-items: center;

        @media (max-width: 768px) {
            flex-direction: column;
            justify-content: center;
        }

        .logo {
            text-decoration: unset;
            color: white;
            font-size: 2.5rem;
            font-weight: 900;
            transition: text-shadow .3s;

            &:hover {
                text-decoration: none;
                text-shadow: 0 0 9px rgba(37,146,238,.9), 0 0 9px rgba(37,146,238,.9), 0 0 9px rgba(37,146,238,.9);
            }


        }
        .search {
            display: flex;
            align-items: center;
            justify-content: space-between;
            width: 520px;
            position: relative;
            background-color: white;
            border-radius: 20px;
            padding: 5px 10px;
            margin: 0 10px;

            .search-list{
                position: absolute;
                top: 55px;
                display: none;
                left: 0;
                right: 0;
                background-color:white;
                height: 100px;
                z-index: 10;
                border-radius: 20px;
                padding: 10px;
            }

            @media (max-width: 768px) {
                width: 100%;
            }

            input {
                outline: none;
                border: none;
                width: 90%;

            }
        }
        .nav-top {
            ul{
                margin: 0;
                padding: 0;
                display: flex;
                align-items: center;
                list-style-type: none;
                gap: 10px;

                @media (max-width: 768px) {
                    margin-top: 10px;
                    gap: 20px;
                }

                li {
                    a {
                        position: relative;
                        &:hover {
                            .header-link-hover{
                                opacity: 1;
                            }
                        }

                        .header-link-hover{
                            opacity: 0;
                            position: absolute;
                            top: -3;
                            left: 0;
                            transition: opacity .3s;
                        }
                    }
                }
            }

        }

    }

    .header-bottom {
        margin-top: 10px;
        nav{
            font-family: quantico,sans-serif;
            text-transform: uppercase;
            font-size: 1.2rem;
            font-weight: 300;

            ul {
                align-items: center;
                display: flex;
                justify-content: center;
                list-style: none;
                margin: 0;
                padding: 0;
                flex-wrap: wrap;

                li {
                    margin: 0;
                    padding: 0;

                    a{
                        padding: 4px 8px 20px;
                        color: #fff;
                        display: block;
                        text-decoration: unset;
                        white-space: nowrap;
                        transition: text-shadow .3s;

                        &:hover {
                            text-decoration: none;
                            text-shadow: 0 0 9px rgba(37,146,238,.9), 0 0 9px rgba(37,146,238,.9), 0 0 9px rgba(37,146,238,.9);
                        }
                    }
                }
            }
        }
    }
}

</style>

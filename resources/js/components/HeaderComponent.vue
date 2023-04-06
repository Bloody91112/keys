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
                    <template v-if="searchResult">
                        <li v-if=" searchResult.products.length > 0">
                            <span>Products</span>
                            <ul>
                                <li v-for="product in searchResult.products">
                                    <RouterLink :to="{ name: 'products.item', params: { id: product.id } }">
                                        {{ product.title }}
                                    </RouterLink>
                                </li>
                            </ul>
                        </li>
                        <li v-if="searchResult.tags.length > 0">
                            <span>Tags</span>
                            <ul>
                                <li v-for="tag in searchResult.tags">
                                    <RouterLink :to="{ name: 'tags.item', params: { id: tag.id } }">
                                        {{ tag.title }}
                                    </RouterLink>
                                </li>
                            </ul>
                        </li>
                        <li v-if="searchResult.categories.length > 0">
                            <span>Categories</span>
                            <ul>
                                <li v-for="category in searchResult.categories">
                                    <RouterLink :to="{ name: 'categories.item', params: { id: category.id } }">
                                        {{ category.title }}
                                    </RouterLink>
                                </li>
                            </ul>
                        </li>
                        <li v-if="searchResult.categories.length === 0 && searchResult.tags.length === 0 && searchResult.products.length === 0">
                            <span>No results</span>
                        </li>
                    </template>
                </ul>
            </div>
            <nav class="nav-top">
                <ul>
                    <li>
                        <div class="wishlist">
                            <RouterLink :to="{ name: 'wishlist.index' }">
                                <img src="../../images/icons/wishlist.svg" width="39" height="42" alt="wishlist">
                                <img class="header-link-hover" src="../../images/icons/wishlist.svg" width="39"
                                     height="42" alt="wishlist">
                            </RouterLink>
                        </div>
                    </li>
                    <li>
                        <div class="account">
                            <RouterLink :to="{ name: 'account.index' }">
                                <img src="../../images/icons/account.svg" width="39" height="42" alt="account">
                                <img class="header-link-hover" src="../../images/icons/account.svg" width="39"
                                     height="42" alt="account">
                            </RouterLink>
                        </div>
                    </li>
                    <li>
                        <div class="cart">
                            <RouterLink :to="{ name: 'cart.index' }">
                                <img src="../../images/icons/cart.svg" width="39" height="42" alt="cart">
                                <img class="header-link-hover" src="../../images/icons/cart.svg" width="39" height="42"
                                     alt="cart">
                                <span v-show="cartItemsCount > 0" class="counter">{{ cartItemsCount }}</span>
                            </RouterLink>
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
    data() {
        return {
            searchValue: null,
        }
    },
    watch: {
        searchValue(to, from) {
            this.handleInput(to)
        },
        $route(to, from) {
            if (to !== from){
                this.$refs.searchList.style.display = 'none'
            }
        }
    },
    mounted() {
        this.$store.dispatch('getCategories')
        let list = this.$refs.searchList

        document.addEventListener('click', function(e){
            let searchBlock = e.target.closest('.search')
            if (!searchBlock){
                list.style.display = 'none'
            }
        })

    },
    methods: {
        handleInput(text) {
            if (text !== '' && text.length > 2) {
                this.$store.dispatch('getSearchResult', text)
                this.$refs.searchList.style.display = 'flex'
            } else {
                this.$refs.searchList.style.display = 'none'
            }
        },
    },
    computed: {
        searchResult() {
            return this.$store.getters.searchResult
        },
        categories() {
            return this.$store.getters.categories
        },
        cartItemsCount(){
          let cartItems = JSON.parse(localStorage.getItem('cartItems'));
          if (cartItems && cartItems.length > 0){
              return cartItems.length
          }
          return 0
        }
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
                text-shadow: 0 0 9px rgba(37, 146, 238, .9), 0 0 9px rgba(37, 146, 238, .9), 0 0 9px rgba(37, 146, 238, .9);
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

            .search-list {
                position: absolute;
                top: 55px;
                display: none;
                flex-direction: column;
                left: 0;
                right: 0;
                background-color: white;
                z-index: 10;
                border-radius: 10px;
                padding: 10px;
                list-style-type: none;
                max-height: 50vh;
                overflow: auto;


                &::-webkit-scrollbar {
                    width: 15px;

                }

                &::-webkit-scrollbar-track {
                    background-color: white;
                    border-radius: 100px;
                }

                &::-webkit-scrollbar-thumb {
                    background-color: #1F143D;
                    border-radius: 5px;
                    border: 1px solid white;
                }


                span {
                    color: black;
                    font-weight: 500;
                }

                ul {
                    margin-left: 10px;
                }

                a {
                    text-decoration: none;
                    font-size: 1.3rem;
                    color: #1F143D;
                    font-weight: 800;
                }

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
            ul {
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
                            .header-link-hover {
                                opacity: 1;
                            }
                        }

                        .header-link-hover {
                            opacity: 0;
                            position: absolute;
                            top: -3;
                            left: 0;
                            transition: opacity .3s;
                        }

                        .counter{
                            position: absolute;
                            top: 10px;
                            right: -10px;
                            padding: 2px 8px;
                            border-radius: 50%;
                            background-color: rgba(37, 146, 238, .9);
                            font-size: 0.9rem;
                            font-weight: 600;
                            color: white;
                            text-decoration: unset;

                        }
                    }
                }
            }

        }

    }

    .header-bottom {
        margin-top: 10px;

        nav {
            font-family: quantico, sans-serif;
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

                    a {
                        padding: 4px 8px 20px;
                        color: #fff;
                        display: block;
                        text-decoration: unset;
                        white-space: nowrap;
                        transition: text-shadow .3s;

                        @media (max-width: 768px) {
                            padding: 4px 8px;
                        }

                        &:hover {
                            text-decoration: none;
                            text-shadow: 0 0 9px rgba(37, 146, 238, .9), 0 0 9px rgba(37, 146, 238, .9), 0 0 9px rgba(37, 146, 238, .9);
                        }
                    }
                }
            }
        }
    }
}

</style>

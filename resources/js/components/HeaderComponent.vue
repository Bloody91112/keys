<template>
    <header>
        <div class="header-top">
            <span class="nav-toggle">
                <img src="../../images/icons/nav-toggle.svg" alt="toggle">
            </span>
            <a class="logo" href="#">SKEYS</a>
            <div class="search">
                <input id="search"
                       type="text"
                       name="q"
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
        <div class="header-bottom"></div>
    </header>
</template>

<script>
export default {
    name: "HeaderComponent"
}
</script>

<style lang="scss" scoped>
header {
    padding: 10px 10px 0;
    .header-top {
        display: flex;
        justify-content: space-between;
        align-items: center;

        @media (max-width: 768px) {
            justify-content: unset;
        }

        .nav-toggle{
            display: none;

            @media (max-width: 768px) {
                display: block;
            }
        }
        .logo {
            text-decoration: unset;
            color: white;
            font-size: 2.5rem;
        }
        .search {
            display: flex;
            align-items: center;
            justify-content: space-between;
            max-width: 420px;
            background-color: white;
            border-radius: 20px;
            padding: 5px 10px;

            @media (max-width: 768px) {
                display: none;
            }

            input {
                outline: none;
                border: none;
            }
        }
        .nav-top {

            @media (max-width: 768px) {
                margin-left: auto;
            }

            ul{
                margin: 0;
                padding: 0;
                display: flex;
                align-items: center;
                list-style-type: none;
                gap: 10px;

                @media (max-width: 768px) {
                    gap: 5px;
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
    }
}

</style>

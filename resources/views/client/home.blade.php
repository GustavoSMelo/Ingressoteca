@extends('layout')

@section('css')
    <link rel="stylesheet" type="text/css" href="/css/home.css" />
@endsection

@section('content')
    <header>
        <figure>
            <img src="/images/ingressoteca.png" alt="logo" />
        </figure>
        <ul>
            <li>
                <span>Welcome User</span>
                <img src="/images/user.png" alt="user icon" />
            </li>
        </ul>
    </header>
    <main>
        <nav>
            <div>open</div>
            <ul>
                <li>
                    Health
                </li>
                <li>
                    Tecnology
                </li>
                <li>
                    Business
                </li>
                <li>
                    Education
                </li>
                <li>
                    Entertainments
                </li>
                <li>
                    Others
                </li>
            </ul>
        </nav>
        <span>
            <h1>The most popular show</h1>
            <section class="banner">
                <figure>
                    <img src="/images/show-background.jpg" alt="banner" />
                </figure>
                <article>
                    <h1>Show name</h1>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur malesuada id sapien vel commodo. Cras imperdiet ipsum id mattis aliquet. Vestibulum ultrices sapien massa. Suspendisse id lacus quis justo lacinia condimentum id rutrum felis. Sed ac bibendum purus, non tristique mi. In fringilla erat vitae mi sodales, quis maximus dolor auctor. Nam eu mi et purus elementum congue at eu libero. Praesent cursus et risus et varius. Sed dapibus nec ante sit amet tempor. Duis aliquet nisl massa, in tempus nisi euismod vel. Etiam venenatis ipsum est, eu malesuada leo consequat eu.

                    Morbi hendrerit cursus nulla, eget dignissim quam ullamcorper at. Aliquam hendrerit auctor rutrum. In quis pulvinar tortor. Suspendisse at tortor et magna tempor porttitor. Praesent aliquam maximus libero, in lobortis felis commodo a. Cras felis elit, pulvinar nec semper a, iaculis at nunc. Suspendisse lobortis varius dignissim. Proin metus ligula, sollicitudin nec leo in, facilisis aliquet est. Suspendisse faucibus, sapien sit amet tempor pulvinar, enim justo varius purus, vel hendrerit neque turpis porta ante. Cras eget tortor id risus imperdiet tincidunt quis ac sem. Morbi vel maximus risus.
                    </p>
                    <button type="button">Purchase</button>
                </article>
            </section>

            <h2>Awesome shows to you see: </h2>
            <section class="show-grid">
                <ul>
                    <li>
                        <figure>
                            <img src="/images/show-background.jpg" alt="banner" />
                        </figure>
                        <span>
                            <h2>Show name</h2>
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur malesuada id sapien vel commodo. Cras imperdiet ipsum id mattis aliquet.
                            </p>
                            <button type="button">Purchase</button>
                        </span>
                    </li>
                    <li>
                        <figure>
                            <img src="/images/show-background.jpg" alt="banner" />
                        </figure>
                        <span>
                            <h2>Show name</h2>
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur malesuada id sapien vel commodo. Cras imperdiet ipsum id mattis aliquet.
                            </p>
                            <button type="button">Purchase</button>
                        </span>
                    </li>
                    <li>
                        <figure>
                            <img src="/images/show-background.jpg" alt="banner" />
                        </figure>
                        <span>
                            <h2>Show name</h2>
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur malesuada id sapien vel commodo. Cras imperdiet ipsum id mattis aliquet.
                            </p>
                            <button type="button">Purchase</button>
                        </span>
                    </li>
                    <li>
                        <figure>
                            <img src="/images/show-background.jpg" alt="banner" />
                        </figure>
                        <span>
                            <h2>Show name</h2>
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur malesuada id sapien vel commodo. Cras imperdiet ipsum id mattis aliquet.
                            </p>
                            <button type="button">Purchase</button>
                        </span>
                    </li>
                    <li>
                        <figure>
                            <img src="/images/show-background.jpg" alt="banner" />
                        </figure>
                        <span>
                            <h2>Show name</h2>
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur malesuada id sapien vel commodo. Cras imperdiet ipsum id mattis aliquet.
                            </p>
                            <button type="button">Purchase</button>
                        </span>
                    </li>
                    <li>
                        <figure>
                            <img src="/images/show-background.jpg" alt="banner" />
                        </figure>
                        <span>
                            <h2>Show name</h2>
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur malesuada id sapien vel commodo. Cras imperdiet ipsum id mattis aliquet.
                            </p>
                            <button type="button">Purchase</button>
                        </span>
                    </li>
                    <li>
                        <figure>
                            <img src="/images/show-background.jpg" alt="banner" />
                        </figure>
                        <span>
                            <h2>Show name</h2>
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur malesuada id sapien vel commodo. Cras imperdiet ipsum id mattis aliquet.
                            </p>
                            <button type="button">Purchase</button>
                        </span>
                    </li>
                    <li>
                        <figure>
                            <img src="/images/show-background.jpg" alt="banner" />
                        </figure>
                        <span>
                            <h2>Show name</h2>
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur malesuada id sapien vel commodo. Cras imperdiet ipsum id mattis aliquet.
                            </p>
                            <button type="button">Purchase</button>
                        </span>
                    </li>
                </ul>
            </section>
        </span>
    </main>
@endsection

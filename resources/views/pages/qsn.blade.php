@extends('layouts.app')
@section('content')
    <!-- Start main-content -->
    <div class="main-content">
        <!-- Section: inner-header -->
        <section class="inner-header divider parallax layer-overlay overlay-white-8"
                 data-bg-img="{{ asset('images/bg/bg6.jpg') }}">
            <div class="container pt-60 pb-60">
                <!-- Section Content -->
                <div class="section-content">
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <h2 class="title">FAQ</h2>
                            <ol class="breadcrumb text-center text-black mt-10">
                                <li><a href="/">Home</a></li>
                                <li class="active text-theme-colored">Qui somme Nous?</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section>
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <div id="accordion1" class="panel-group accordion">
                            <div class="panel">
                                <div class="panel-title"><a data-parent="#accordion1" data-toggle="collapse"
                                                            href="#accordion11" class="active" aria-expanded="true">
                                        <span class="open-sub"></span> <strong>Q. What do you mean by item and end
                                            product?</strong></a></div>
                                <div id="accordion11" class="panel-collapse collapse in" role="tablist"
                                     aria-expanded="true">
                                    <div class="panel-content">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam officia
                                            dolor rerum enim doloremque iusto eos atque tempora dignissimos similique,
                                            quae, maxime sit accusantium delectus, maiores officiis vitae fuga sunt
                                            repellendus. Molestiae quae, ducimus ut tenetur nobis id quam autem
                                            quibusdam commodi inventore laborum libero officiis</p>
                                        <p>Accusantium a laboriosam cumque consequatur voluptates fuga assumenda
                                            corporis amet. Vitae placeat architecto ipsa cumque fugiat, atque molestiae
                                            perferendis quasi quaerat iste voluptate quas dicta corporis, incidunt
                                            quibusdam quia odit unde, rem harum quis! Optio debitis veniam quibusdam,
                                            culpa quia, aperiam cupiditate perspiciatis repellat similique saepe magnam
                                            quaerat iusto obcaecati doloremque, dolor praesentium.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="panel">
                                <div class="panel-title"><a class="collapsed" data-parent="#accordion1"
                                                            data-toggle="collapse" href="#accordion12"
                                                            aria-expanded="false"> <span class="open-sub"></span>
                                        <strong>Q. What are some examples of permitted end products?</strong></a></div>
                                <div id="accordion12" class="panel-collapse collapse" role="tablist"
                                     aria-expanded="false" style="height: 0px;">
                                    <div class="panel-content">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam officia
                                            dolor rerum enim doloremque iusto eos atque tempora dignissimos similique,
                                            quae, maxime sit accusantium delectus, maiores officiis vitae fuga sunt
                                            repellendus. Molestiae quae, ducimus ut tenetur nobis id quam autem
                                            quibusdam commodi inventore laborum libero officiis</p>
                                        <p>Accusantium a laboriosam cumque consequatur voluptates fuga assumenda
                                            corporis amet. Vitae placeat architecto ipsa cumque fugiat, atque molestiae
                                            perferendis quasi quaerat iste voluptate quas dicta corporis, incidunt
                                            quibusdam quia odit unde, rem harum quis! Optio debitis veniam quibusdam,
                                            culpa quia, aperiam cupiditate perspiciatis repellat similique saepe magnam
                                            quaerat iusto obcaecati doloremque, dolor praesentium.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="panel">
                                <div class="panel-title"><a data-parent="#accordion1" data-toggle="collapse"
                                                            href="#accordion13" class="collapsed" aria-expanded="false">
                                        <span class="open-sub"></span> <strong>Q. Am I allowed to modify the item that I
                                            purchased?</strong></a></div>
                                <div id="accordion13" class="panel-collapse collapse" role="tablist"
                                     aria-expanded="false">
                                    <div class="panel-content">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam officia
                                            dolor rerum enim doloremque iusto eos atque tempora dignissimos similique,
                                            quae, maxime sit accusantium delectus, maiores officiis vitae fuga sunt
                                            repellendus. Molestiae quae, ducimus ut tenetur nobis id quam autem
                                            quibusdam commodi inventore laborum libero officiis</p>
                                        <p>Accusantium a laboriosam cumque consequatur voluptates fuga assumenda
                                            corporis amet. Vitae placeat architecto ipsa cumque fugiat, atque molestiae
                                            perferendis quasi quaerat iste voluptate quas dicta corporis, incidunt
                                            quibusdam quia odit unde, rem harum quis! Optio debitis veniam quibusdam,
                                            culpa quia, aperiam cupiditate perspiciatis repellat similique saepe magnam
                                            quaerat iusto obcaecati doloremque, dolor praesentium.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="panel">
                                <div class="panel-title"><a data-parent="#accordion1" data-toggle="collapse"
                                                            href="#accordion14" class="collapsed" aria-expanded="false">
                                        <span class="open-sub"></span> <strong>Q. What does non-exclusive mean?</strong></a>
                                </div>
                                <div id="accordion14" class="panel-collapse collapse" role="tablist"
                                     aria-expanded="false">
                                    <div class="panel-content">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam officia
                                            dolor rerum enim doloremque iusto eos atque tempora dignissimos similique,
                                            quae, maxime sit accusantium delectus, maiores officiis vitae fuga sunt
                                            repellendus. Molestiae quae, ducimus ut tenetur nobis id quam autem
                                            quibusdam commodi inventore laborum libero officiis</p>
                                        <p>Accusantium a laboriosam cumque consequatur voluptates fuga assumenda
                                            corporis amet. Vitae placeat architecto ipsa cumque fugiat, atque molestiae
                                            perferendis quasi quaerat iste voluptate quas dicta corporis, incidunt
                                            quibusdam quia odit unde, rem harum quis! Optio debitis veniam quibusdam,
                                            culpa quia, aperiam cupiditate perspiciatis repellat similique saepe magnam
                                            quaerat iusto obcaecati doloremque, dolor praesentium.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="panel">
                                <div class="panel-title"><a data-parent="#accordion1" data-toggle="collapse"
                                                            href="#accordion15" class="collapsed" aria-expanded="false">
                                        <span class="open-sub"></span> <strong>Q. What is a single application?</strong></a>
                                </div>
                                <div id="accordion15" class="panel-collapse collapse" role="tablist"
                                     aria-expanded="false">
                                    <div class="panel-content">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam officia
                                            dolor rerum enim doloremque iusto eos atque tempora dignissimos similique,
                                            quae, maxime sit accusantium delectus, maiores officiis vitae fuga sunt
                                            repellendus. Molestiae quae, ducimus ut tenetur nobis id quam autem
                                            quibusdam commodi inventore laborum libero officiis</p>
                                        <p>Accusantium a laboriosam cumque consequatur voluptates fuga assumenda
                                            corporis amet. Vitae placeat architecto ipsa cumque fugiat, atque molestiae
                                            perferendis quasi quaerat iste voluptate quas dicta corporis, incidunt
                                            quibusdam quia odit unde, rem harum quis! Optio debitis veniam quibusdam,
                                            culpa quia, aperiam cupiditate perspiciatis repellat similique saepe magnam
                                            quaerat iusto obcaecati doloremque, dolor praesentium.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <!-- end main-content -->
@stop
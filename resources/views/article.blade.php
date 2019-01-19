@include('layouts.header')
<body class="animsition">
    <div class="page-wrapper">

        @include('layouts.sidebar')

        <!-- PAGE CONTAINER-->
        <div class="page-container">

            <!-- MAIN CONTENT-->
            <div class="main-content-no-padding">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <!-- DATA TABLE-->
                        <section class="p-t-20">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-12">
                                        <h3 class="title-5 m-b-35">Articles</h3>
                                        <div class="table-data__tool">
                                            <div class="table-data__tool-right">
                                                <a href="{{ route('articles', ['company' => $company]) }}" class="au-btn au-btn-icon {{ $label == 'positive' ? 'au-btn--green' : 'au-btn--gray' }} au-btn--small">
                                                    Positive
                                                </a>
                                                <a href="{{ route('articles', ['company' => $company, 'label' => 'negative']) }}" 
                                                    class="au-btn au-btn-icon {{ $label == 'negative' ? 'au-btn--green' : 'au-btn--gray' }} au-btn--small">
                                                    Negative
                                                </a>
                                            </div>
                                        </div>
                                        <div class="table-responsive table-responsive-data2">
                                            <table class="table table-data2">
                                                <thead>
                                                    <tr>
                                                        <th>Date</th>
                                                        <th>Title</th>
                                                        <th>Actual Price (RM)</th>
                                                        <th>Price Prediction (RM)</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($data as $prediction_key => $prediction)
                                                        @foreach ($prediction['articles'] as $article_key => $article)
                                                        <tr class="tr-shadow">
                                                            <td class="col-xs-2">{{ $prediction['date'] }}</td>
                                                            <td style="width: 50%; cursor: pointer;" class="desc">
                                                                <span data-toggle="modal" data-target="#articleModal" data-article="article_{{ $prediction_key . $article_key }}">{{ $article['title'] }}</span>
                                                                <input type="hidden" id="article_{{ $prediction_key . $article_key }}" value="{{ $article['article'] }}">
                                                            </td>
                                                            <td>{{ $prediction['actual_price'] }}</td>
                                                            <td>{{ $prediction['price_prediction'] }}</td>
                                                        </tr>
                                                        <tr class="tr-shadow"></tr>
                                                        @endforeach
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                        <!-- END DATA TABLE-->
                    </div>
                </div>
            </div>
            <!-- END MAIN CONTENT-->

            <!-- modal scroll -->
            <div class="modal fade" id="articleModal" tabindex="-1" role="dialog" aria-labelledby="articleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="article-title"></h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p>
                                <span id="article-content"></span>
                            </p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END PAGE CONTAINER-->
        </div>
    </div>
    @include('layouts.footer')
    <script type="text/javascript">
        $('#articleModal').on('show.bs.modal', function (event) {
            var titleButton = $(event.relatedTarget)
            var articleId = titleButton.data('article')

            var content = $('#' + articleId).val();
            $('#article-content').html(content);
            $('#article-title').html(titleButton[0].innerHTML);
        })
    </script>
    <!-- end document-->

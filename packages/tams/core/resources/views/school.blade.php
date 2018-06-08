@extends('layouts.app')

@section('app_content')

<div class="card">
    <div class="card-heading">
        <h2>School</h2>
    </div>
    <div class="card-tools">
        <ul class="list-inline">
            <li class="dropdown">
                <a md-ink-ripple="" data-toggle="dropdown" class="md-btn md-flat md-btn-circle waves-effect" aria-expanded="false">
                    <i class="mdi-navigation-more-vert text-md"></i>
                </a>
                <ul class="dropdown-menu dropdown-menu-scale pull-right pull-up top text-color">
                    <li><a href="">New</a></li>
                    <li><a href="">Another action</a></li>
                </ul>
            </li>
        </ul>
    </div>
    <div class="card-body">
        <div class="row" >
            <div class="col-sm-12">
                <div class="panel-body b-b b-light">
                    Search: <input id="filter" type="text" class="form-control input-sm w-auto inline m-r"/>
                </div>
                <div>
                    <table class="table m-b-none" ui-jp="footable" data-filter="#filter" data-page-size="5">
                        <thead>
                            <tr>
                                <th data-toggle="true">
                                    School Name
                                </th>
                                <th>
                                    Short Name
                                </th>
                                <th data-hide="phone,tablet">
                                    E-mail
                                </th>
                                <th data-hide="phone,tablet" data-name="Date Of Birth">
                                    DOB
                                </th>
                                <th data-hide="phone">
                                    Status
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Isidra</td>
                                <td><a href>Boudreaux</a></td>
                                <td>Traffic Court Referee</td>
                                <td data-value="78025368997">22 Jun 1972</td>
                                <td data-value="1"><span class="label bg-success" title="Active">Active</span></td>
                            </tr>
                            <tr>
                                <td>Shona</td>
                                <td>Woldt</td>
                                <td><a href>Airline Transport Pilot</a></td>
                                <td data-value="370961043292">3 Oct 1981</td>
                                <td data-value="2"><span class="label bg-light" title="Disabled">Disabled</span></td>
                            </tr>
                            <tr>
                                <td>Granville</td>
                                <td>Leonardo</td>
                                <td>Business Services Sales Representative</td>
                                <td data-value="-22133780420">19 Apr 1969</td>
                                <td data-value="3"><span class="label bg-warning" title="Suspended">Suspended</span>
                                </td>
                            </tr>
                            <tr>
                                <td>Easer</td>
                                <td>Dragoo</td>
                                <td>Drywall Stripper</td>
                                <td data-value="250833505574">13 Dec 1977</td>
                                <td data-value="1"><span class="label bg-success" title="Active">Active</span></td>
                            </tr>
                            <tr>
                                <td>Maple</td>
                                <td>Halladay</td>
                                <td>Aviation Tactical Readiness Officer</td>
                                <td data-value="694116650726">30 Dec 1991</td>
                                <td data-value="3"><span class="label bg-warning" title="Suspended">Suspended</span>
                                </td>
                            </tr>
                            <tr>
                                <td>Maxine</td>
                                <td><a href>Woldt</a></td>
                                <td><a href>Business Services Sales Representative</a></td>
                                <td data-value="561440464855">17 Oct 1987</td>
                                <td data-value="2"><span class="label bg-light" title="Disabled">Disabled</span></td>
                            </tr>
                            <tr>
                                <td>Lorraine</td>
                                <td>Mcgaughy</td>
                                <td>Hemodialysis Technician</td>
                                <td data-value="437400551390">11 Nov 1983</td>
                                <td data-value="2"><span class="label bg-light" title="Disabled">Disabled</span></td>
                            </tr>
                            <tr>
                                <td>Lizzee</td>
                                <td><a href>Goodlow</a></td>
                                <td>Technical Services Librarian</td>
                                <td data-value="-257733999319">1 Nov 1961</td>
                                <td data-value="3"><span class="label bg-warning" title="Suspended">Suspended</span>
                                </td>
                            </tr>
                            <tr>
                                <td>Judi</td>
                                <td>Badgett</td>
                                <td>Electrical Lineworker</td>
                                <td data-value="362134712000">23 Jun 1981</td>
                                <td data-value="1"><span class="label bg-success" title="Active">Active</span></td>
                            </tr>
                            <tr>
                                <td>Lauri</td>
                                <td>Hyland</td>
                                <td>Blackjack Supervisor</td>
                                <td data-value="500874333932">15 Nov 1985</td>
                                <td data-value="3"><span class="label bg-warning" title="Suspended">Suspended</span>
                                </td>
                            </tr>
                        </tbody>
                        <tfoot class="hide-if-no-paging">
                            <tr>
                                <td colspan="5" class="text-center">
                                    <ul class="pagination"></ul>
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection


@push('style')

@endpush

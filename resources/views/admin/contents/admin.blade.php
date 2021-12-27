@extends("admin.layouts.main")
@section('employee')

<div class="card">
    <div class="card-header">
        <h3>Employee Management</h3>
        
        <button type="button" class="btn btn-success" data-container="body" data-toggle="popover" title="Success color states" style = "float:right">
            <a href="{{route('admin.create')}}">Add</a>
        </button>

    </div>
    <div class="card-block">
        <table id="demo-foo-filtering" class="table table-striped">
            <thead>
                <tr>
                    <th>First Name</th>
                    <th data-breakpoints="xs">Last Name</th>
                    <th data-breakpoints="xs">Job Title</th>
                    <th data-breakpoints="xs">BOB</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Tiger Nixon</td>
                    <td>System Architect</td>
                    <td>Edinburgh</td>
                    <td>61</td>
                    <td><span class="tag tag-danger"> Suspended</span>
                    </td>
                </tr>
                <tr>
                    <td>Garrett</td>
                    <td>Accountant</td>
                    <td>Tokyo</td>
                    <td>63</td>
                    <td><span class="tag tag-danger"> Active</span>
                    </td>
                </tr>
                <tr>
                    <td>Cox</td>
                    <td>Author</td>
                    <td>San</td>
                    <td>66</td>
                    <td><span class="tag tag-default">Disabled</span>
                    </td>
                </tr>
                <tr>
                    <td>Kelly</td>
                    <td>Brielle</td>
                    <td>Edinburgh</td>
                    <td>22</td>
                    <td><span class="tag tag-success">Active</span>
                    </td>
                </tr>
                <tr>
                    <td>Airi Satou</td>
                    <td>Accountant</td>
                    <td>Tokyo</td>
                    <td>33</td>
                    <td><span class="tag tag-success"> Active</span>
                    </td>
                </tr>
                <tr>
                    <td>Brielle</td>
                    <td>Specialist</td>
                    <td>New York</td>
                    <td>61</td>
                    <td><span class="tag tag-default">Disabled</span>
                    </td>
                </tr>
                <tr>
                    <td>Herrod Chandler</td>
                    <td>Sales Assistant</td>
                    <td>San</td>
                    <td>59</td>
                    <td><span class="tag tag-danger">Suspended</span>
                    </td>
                </tr>
                <tr>
                    <td>Rhona Davidson</td>
                    <td>Specialist</td>
                    <td>Tokyo</td>
                    <td>55</td>
                    <td><span class="tag tag-success"> Active</span>
                    </td>
                </tr>
                <tr>
                    <td>Colleen Hurst</td>
                    <td>Javascript Developer</td>
                    <td>San</td>
                    <td>39</td>
                    <td><span class="tag tag-default">Disabled</span>
                    </td>
                </tr>
                <tr>
                    <td>Sonya Frost</td>
                    <td>Software</td>
                    <td>Edinburgh</td>
                    <td>23</td>
                    <td><span class="tag tag-danger">Suspended</span>
                    </td>
                </tr>
                <tr>
                    <td>Jena Gaines</td>
                    <td>Office Manager</td>
                    <td>London</td>
                    <td>30</td>
                    <td><span class="tag tag-success"> Active</span>
                    </td>
                </tr>
                <tr>
                    <td>Flynn</td>
                    <td>Support Lead</td>
                    <td>Edinburgh</td>
                    <td>22</td>
                    <td><span class="tag tag-default">Disabled</span>
                    </td>
                </tr>
                <tr>
                    <td>Charde Marshall</td>
                    <td>Regional Director</td>
                    <td>San</td>
                    <td>36</td>
                    <td><span class="tag tag-danger">Suspended</span>
                    </td>
                </tr>
                <tr>
                    <td>Haley Kennedy</td>
                    <td>Senior Marketing Designer</td>
                    <td>London</td>
                    <td>43</td>
                    <td><span class="tag tag-success"> Active</span>
                    </td>
                </tr>
                <tr>
                    <td>Tatyana Fitzpatrick</td>
                    <td>Regional Director</td>
                    <td>London</td>
                    <td>19</td>
                    <td><span class="tag tag-default">Disabled</span>
                    </td>
                </tr>
                <tr>
                    <td>Michael Silva</td>
                    <td>Marketing Designer</td>
                    <td>London</td>
                    <td>66</td>
                    <td><span class="tag tag-danger">Suspended</span>
                    </td>
                </tr>
                <tr>
                    <td>Paul Byrd</td>
                    <td>(CFO)</td>
                    <td>New York</td>
                    <td>64</td>
                    <td><span class="tag tag-success"> Active</span>
                    </td>
                </tr>
                <tr>
                    <td>Gloria Little</td>
                    <td>Systems Administrator</td>
                    <td>New York</td>
                    <td>59</td>
                    <td><span class="tag tag-default">Disabled</span>
                    </td>
                </tr>
                <tr>
                    <td>Bradley Greer</td>
                    <td>Software</td>
                    <td>London</td>
                    <td>41</td>
                    <td><span class="tag tag-danger">Suspended</span>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

@endsection
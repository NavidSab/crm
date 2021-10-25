

@extends('layouts.contentLayoutMaster')
@section('title', $title)
@section('page-style')
 <!-- Page css files -->
 <link href="{{Module::asset('menu:menu.css')}}" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('assets/vendors/css/extensions/toastr.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/plugins/extensions/ext-component-toastr.min.css') }}">
 {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">
 <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.2/css/all.css"> --}}
 @endsection
@section('content')
<div class="container" id="king_wrap">
	<div class="custom-wp-admin wp-admin wp-core-ui js   menu-max-depth-0 nav-menus-php auto-fold admin-bar">
		<div id="wpwrap">
			<div id="wpcontent">
				<div id="wpbody">
					<div id="wpbody-content">
						<div class="wrap">
							<div class="manage-menus">
								<form method="get" action="{{ $currentUrl }}">
									<label for="menu" class="selected-menu">Select the menu you want to edit:</label>
                                    <select name="menu">
                                        @foreach ($menulist as $key => $val) 
                                            <option  @if(request()->input('menu') == $key) selected  @endif   value="{{ $key }}" >{{ $val }}</option>
                                        @endforeach
                                        </select>
									<span class="submit-btn">
										<input type="submit" class="button-secondary" value="Choose">
									</span>
									<span class="add-new-menu-action"> or <a href="{{ $currentUrl }}?action=edit&menu=0">Create new menu</a>. </span>
								</form>
							</div>
							<div id="nav-menus-frame">
								@if(request()->has('menu')  && !empty(request()->input("menu")))
								<div id="menu-settings-column" class="metabox-holder">
									<div class="clear"></div>
									<form id="nav-menu-meta" action="" class="nav-menu-meta" method="post" enctype="multipart/form-data" >
										<div id="side-sortables" class="accordion-container">
											<ul class="outer-border">

												<li class="control-section accordion-section  open add-page" id="add-page">
													<h3 class="accordion-section-title hndle" tabindex="0"> Custom Link <span class="screen-reader-text">Press return or enter to expand</span></h3>
													<div class="accordion-section-content ">
														<div class="inside">
															<div class="customlinkdiv" id="customlinkdiv">
																<p id="menu-item-url-wrap">
																	<label class="control-label" for="url"> <span>URL</span>&nbsp;&nbsp;&nbsp;
																		<input id="url" name="url" type="text" class="form-control " placeholder="url">
																	</label>
																</p>
                                                                <hr>
																<p id="menu-item-is_mega-wrap">
																	<label class="control-label" for="is_mega">Mega</label>
																		<input id="is_mega" name="is_mega" type="checkbox"  class="form-control" checked>
																	
																</p>
                                                                <hr>

                                                                <p id="menu-item-mega_image-wrap">
																	<label class="control-label" for="mega_image"> <span>Background</span>&nbsp;
																		<input id="mega_image" name="mega_image" type="file" class="form-control"  >
																	</label>
																</p>

                                                                <hr>

                                                                <p id="menu-item-label-wrap">
																	<label class="control-label" for="label"> <span>Label</span>&nbsp;
																		<input id="label" name="label" type="text" class="form-control" title="Label menu" required="required">
																	</label>
																</p>
                                                                <hr>

																@if(!empty($roles))
																<p id="menu-item-role-wrap">
																	<label class="control-label" for="role"> <span>Role</span>&nbsp;
																		<select id="role" name="role">
																			<option value="0">Select Role</option>
																			@foreach($roles as $role)
																				<option value="{{ $role->id }}">{{ ucfirst($role->name) }}</option>
																			@endforeach
																		</select>
																	</label>
																</p>
																@endif
                                                                <hr>

																<p class="button-controls">
																	<a  href="#" onclick="addCustomMenu()"  class="button button-primary menu-save"  >Add menu item</a>
																	<span class="spinner" id="spincustomu"></span>
																</p>
															</div>
														</div>
													</div>
												</li>
											</ul>
										</div>
									</form>
								</div>
								@endif
								<div id="menu-management-liquid">
									<div id="menu-management">
										<form id="update-nav-menu" action="" method="post" enctype="multipart/form-data">
											<div class="menu-edit ">
												<div id="nav-menu-header">
													<div class="major-publishing-actions">
														<label class="menu-name-label control-label open-label" for="menu-name"> <span>Name</span>
															
                                                            <input name="menu-name" id="menu-name" type="text" class="menu-name regular-text menu-item-textbox" title="Enter menu name" value="@if(isset($menu)){{$menu->name}}@endif">
															<input type="hidden" id="idmenu" value="@if(isset($menu)){{$menu->id}}@endif" />
														</label>
														@if(request()->has('action'))
														<div class="publishing-action">
															<a onclick="createMenu()" name="save_menu" id="save_menu_header" class="button button-primary menu-save">Create menu</a>
														</div>
														@elseif(request()->has("menu"))
														<div class="publishing-action">
															<a onclick="getMenus()" name="save_menu" id="save_menu_header" class="button button-primary menu-save">Save menu</a>
															<span class="spinner" id="spincustomu2"></span>
														</div>
														@else
														<div class="publishing-action">
															<a onclick="createMenu()" name="save_menu" id="save_menu_header" class="button button-primary menu-save">Create menu</a>
														</div>
														@endif
													</div>
												</div>
												<div id="post-body">
													<div id="post-body-content">
														@if(request()->has("menu"))
									
														<h3>Menu Structure</h3>
														<div class="drag-instructions post-body-plain" style="">
															<p>
																Place each item in the order you prefer. Click on the arrow to the right of the item to display more configuration options.
															</p>
														</div>
														@else
														<h3>Menu Creation</h3>
														<div class="drag-instructions post-body-plain" style="">
															<p>
																Please enter the name and select "Create menu" button
															</p>
														</div>
														@endif
														<ul class="menu ui-sortable" id="menu-to-edit">
															@if(isset($menuItem))
															@foreach($menuItem as $item)
															<li id="menu-item-{{$item->id}}" class="menu-item menu-item-depth-{{$item->depth}} menu-item-page menu-item-edit-inactive pending" style="display: list-item;">
																<dl class="menu-item-bar">
																	<dt class="menu-item-handle">
																		<span class="item-title"> 
                                                                            <span class="menu-item-title"> 
                                                                                <span id="menutitletemp_{{$item->id}}">{{$item->label}}</span> 
                                                                                <span style="color: transparent;">|{{$item->id}}|</span>
                                                                             </span> 
                                                                             <span class="is-submenu" style="@if($item->depth==0)display: none;@endif">Subelement</span>
                                                                             </span>
																		<span class="item-controls">
                                                                             <span class="item-type">Link</span>
                                                                              <span class="item-order hide-if-js"> 
                                                                                  <a href="{{ $currentUrl }}?action=move-up-menu-item&menu-item={{$item->id}}&_wpnonce=8b3eb7ac44" class="item-move-up">
                                                                                    <abbr title="Move Up">↑</abbr></a> | <a href="{{ $currentUrl }}?action=move-down-menu-item&menu-item={{$item->id}}&_wpnonce=8b3eb7ac44" class="item-move-down">
                                                                                        <abbr title="Move Down">↓</abbr></a> </span> 
                                                                                        <a class="item-edit" id="edit-{{$item->id}}" title=" " href="{{ $currentUrl }}?edit-menu-item={{$item->id}}#menu-item-settings-{{$item->id}}">
                                                                                         </a> 
                                                                                        </span>
																	</dt>
																</dl>
																<div class="menu-item-settings" id="menu-item-settings-{{$item->id}}">
																	<input type="hidden" class="edit-menu-item-id" name="menuid_{{$item->id}}" value="{{$item->id}}" />
																	<p class="description description-thin">
																		<label for="edit-menu-item-title-{{$item->id}}"> Label
																			<br>
																			<input type="text" id="idlabelmenu_{{$item->id}}" class="widefat edit-menu-item-title" name="idlabelmenu_{{$item->id}}" value="{{$item->label}}">
																		</label>
																	</p>
														
																	<p class="field-css-classes description description-thin">
																		<label for="edit-menu-item-classes-{{$item->id}}"> Class CSS (optional)
																			<br>
																			<input type="text" id="clases_menu_{{$item->id}}" class="widefat code edit-menu-item-classes" name="clases_menu_{{$item->id}}" value="{{$item->class}}">
																		</label>
																	</p>
																	<p class="field-css-url description description-wide">
																		<label for="edit-menu-item-url-{{$item->id}}"> Url
																			<br>
																			<input type="text" id="url_menu_{{$item->id}}" class="widefat code edit-menu-item-url" id="url_menu_{{$item->id}}" value="{{$item->link}}">
																		</label>
																	</p>
																	@if(!empty($roles))
																	<p class="field-css-role description description-wide">
																		<label for="edit-menu-item-role-{{$item->id}}"> Role
																			<br>
																			<select id="role_menu_{{$item->id}}" class="widefat code edit-menu-item-role" name="role_menu_[{{$item->id}}]" >
																				<option value="0">Select Role</option>
																				@foreach($roles as $role)
																					<option @if($role->id == $item->role_id) selected @endif value="{{ $role->id }}">{{ ucwords($role->name) }}</option>
																				@endforeach
																			</select>
																		</label>
																	</p>
																	@endif
																	<p class="field-move hide-if-no-js description description-wide">
																		<label> <span>Move</span> <a href="{{ $currentUrl }}" class="menus-move-up" style="display: none;">Move up</a> 
                                                                            <a href="{{ $currentUrl }}" class="menus-move-down" title="Mover Down" style="display: inline;">Move Down</a>
                                                                             <a href="{{ $currentUrl }}" class="menus-move-left" style="display: none;"></a>
                                                                              <a href="{{ $currentUrl }}" class="menus-move-right" style="display: none;"></a>
                                                                               <a href="{{ $currentUrl }}" class="menus-move-top" style="display: none;">Top</a>
                                                                             </label>
																	</p>
																	<div class="menu-item-actions description-wide submitbox">
																		<a class="item-delete submitdelete button-primary " id="delete-{{$item->id}}" href="{{ $currentUrl }}?action=delete-menu-item&menu-item={{$item->id}}">Delete</a>
																		<span class="meta-sep hide-if-no-js"> | </span>
																		<a class="item-cancel submitcancel hide-if-no-js button-primary" id="cancel-{{$item->id}}" href="{{ $currentUrl }}?edit-menu-item={{$item->id}}&cancel=14#menu-item-settings-{{$item->id}}">Cancel</a>
																		<span class="meta-sep hide-if-no-js"> | </span>
																		<a onclick="getMenus()" class="button button-primary updatemenu" id="update-{{$item->id}}" href="javascript:void(0)">Update item</a>
																	</div>
																</div>
																<ul class="menu-item-transport"></ul>
															</li>
															@endforeach
															@endif
														</ul>
														<div class="menu-settings">
														</div>
													</div>
												</div>
												<div id="nav-menu-footer">
													<div class="major-publishing-actions">
														@if(request()->has('action'))
														<div class="publishing-action">
															<a onclick="createMenu()" name="save_menu" id="save_menu_header" class="button button-primary menu-save">Create menu</a>
														</div>
														@elseif(request()->has("menu"))
														<span class="delete-action"> <a class="submitdelete deletion menu-delete" onclick="deleteMenu()" href="javascript:void(9)">Delete menu</a> 
                                                        </span>
														<div class="publishing-action">
															<a onclick="getMenus()" name="save_menu" id="save_menu_header" class="button button-primary menu-save">Save menu</a>
															<span class="spinner" id="spincustomu2">

                                                            </span>
														</div>
														@else
														<div class="publishing-action">
															<a onclick="createMenu()" name="save_menu" id="save_menu_header" class="button button-primary menu-save">Create menu</a>
														</div>
														@endif
													</div>
												</div>
											</div>
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- Basic Tables end -->
@endsection
@section('page-script')
<script src="{{ asset('assets/vendors/js/extensions/toastr.min.js') }}"></script>

<script>

    

    var menus = {
        "oneThemeLocationNoMenus": "",
        "moveUp": "Move up",
        "moveDown": "Mover down",
        "moveToTop": "Move top",
        "moveUnder": "Move under of %s",
        "moveOutFrom": "Out from under  %s",
        "under": "Under %s",
        "outFrom": "Out from %s",
        "menuFocus": "%1$s. Element menu %2$d of %3$d.",
        "subMenuFocus": "%1$s. Menu of subelement %2$d of %3$s."
    };
    var arraydata = [];
    var add_custom_menu = '{{ route("custommenu.create") }}';
    var update_menu_item = '{{ route("menuitem.update")}}';
    var generate_menu = '{{ route("generate.menucontrol") }}';
    var delete_menu_item = '{{ route("menuitem.delete") }}';
    var delete_menu = '{{ route("menu.delete") }}';
    var create_menu = '{{ route("menu.create") }}';
    var csrftoken = "{{ csrf_token() }}";
    var currentUrl = "{{ url()->current() }}";
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': csrftoken
        }
    });
</script>
<script type="text/javascript" src="{{Module::asset('menu:js/menuscripts.js')}}"></script>
<script type="text/javascript" src="{{Module::asset('menu:js/mainmenuscripts.js')}}"></script>
<script type="text/javascript" src="{{Module::asset('menu:js/menu.js')}}"></script>
@endsection

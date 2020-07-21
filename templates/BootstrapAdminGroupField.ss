<div class="dropdown">
    <ul>
        <% loop $Options %>
            <button $AttributesHTML>
                <span class="btn__title"><% if $ButtonContent %>$ButtonContent<% else %>$Title<% end_if %></span>
            </button>
        <% end_loop %>
    </ul>
</div>

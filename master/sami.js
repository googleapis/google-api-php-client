
window.projectVersion = 'master';

(function(root) {

    var bhIndex = null;
    var rootPath = '';
    var treeHtml = '        <ul>                <li data-name="namespace:Google" class="opened">                    <div style="padding-left:0px" class="hd">                        <span class="glyphicon glyphicon-play"></span><a href="Google.html">Google</a>                    </div>                    <div class="bd">                                <ul>                <li data-name="namespace:Google_AccessToken" class="opened">                    <div style="padding-left:18px" class="hd">                        <span class="glyphicon glyphicon-play"></span><a href="Google/AccessToken.html">AccessToken</a>                    </div>                    <div class="bd">                                <ul>                <li data-name="class:Google_AccessToken_Revoke" >                    <div style="padding-left:44px" class="hd leaf">                        <a href="Google/AccessToken/Revoke.html">Revoke</a>                    </div>                </li>                            <li data-name="class:Google_AccessToken_Verify" >                    <div style="padding-left:44px" class="hd leaf">                        <a href="Google/AccessToken/Verify.html">Verify</a>                    </div>                </li>                </ul></div>                </li>                            <li data-name="namespace:Google_AuthHandler" class="opened">                    <div style="padding-left:18px" class="hd">                        <span class="glyphicon glyphicon-play"></span><a href="Google/AuthHandler.html">AuthHandler</a>                    </div>                    <div class="bd">                                <ul>                <li data-name="class:Google_AuthHandler_AuthHandlerFactory" >                    <div style="padding-left:44px" class="hd leaf">                        <a href="Google/AuthHandler/AuthHandlerFactory.html">AuthHandlerFactory</a>                    </div>                </li>                            <li data-name="class:Google_AuthHandler_Guzzle5AuthHandler" >                    <div style="padding-left:44px" class="hd leaf">                        <a href="Google/AuthHandler/Guzzle5AuthHandler.html">Guzzle5AuthHandler</a>                    </div>                </li>                            <li data-name="class:Google_AuthHandler_Guzzle6AuthHandler" >                    <div style="padding-left:44px" class="hd leaf">                        <a href="Google/AuthHandler/Guzzle6AuthHandler.html">Guzzle6AuthHandler</a>                    </div>                </li>                            <li data-name="class:Google_AuthHandler_Guzzle7AuthHandler" >                    <div style="padding-left:44px" class="hd leaf">                        <a href="Google/AuthHandler/Guzzle7AuthHandler.html">Guzzle7AuthHandler</a>                    </div>                </li>                </ul></div>                </li>                            <li data-name="namespace:Google_Http" class="opened">                    <div style="padding-left:18px" class="hd">                        <span class="glyphicon glyphicon-play"></span><a href="Google/Http.html">Http</a>                    </div>                    <div class="bd">                                <ul>                <li data-name="class:Google_Http_Batch" >                    <div style="padding-left:44px" class="hd leaf">                        <a href="Google/Http/Batch.html">Batch</a>                    </div>                </li>                            <li data-name="class:Google_Http_MediaFileUpload" >                    <div style="padding-left:44px" class="hd leaf">                        <a href="Google/Http/MediaFileUpload.html">MediaFileUpload</a>                    </div>                </li>                            <li data-name="class:Google_Http_REST" >                    <div style="padding-left:44px" class="hd leaf">                        <a href="Google/Http/REST.html">REST</a>                    </div>                </li>                </ul></div>                </li>                            <li data-name="namespace:Google_Service" class="opened">                    <div style="padding-left:18px" class="hd">                        <span class="glyphicon glyphicon-play"></span><a href="Google/Service.html">Service</a>                    </div>                    <div class="bd">                                <ul>                <li data-name="class:Google_Service_Exception" >                    <div style="padding-left:44px" class="hd leaf">                        <a href="Google/Service/Exception.html">Exception</a>                    </div>                </li>                            <li data-name="class:Google_Service_Resource" >                    <div style="padding-left:44px" class="hd leaf">                        <a href="Google/Service/Resource.html">Resource</a>                    </div>                </li>                </ul></div>                </li>                            <li data-name="namespace:Google_Task" class="opened">                    <div style="padding-left:18px" class="hd">                        <span class="glyphicon glyphicon-play"></span><a href="Google/Task.html">Task</a>                    </div>                    <div class="bd">                                <ul>                <li data-name="class:Google_Task_Composer" >                    <div style="padding-left:44px" class="hd leaf">                        <a href="Google/Task/Composer.html">Composer</a>                    </div>                </li>                            <li data-name="class:Google_Task_Exception" >                    <div style="padding-left:44px" class="hd leaf">                        <a href="Google/Task/Exception.html">Exception</a>                    </div>                </li>                            <li data-name="class:Google_Task_Retryable" >                    <div style="padding-left:44px" class="hd leaf">                        <a href="Google/Task/Retryable.html">Retryable</a>                    </div>                </li>                            <li data-name="class:Google_Task_Runner" >                    <div style="padding-left:44px" class="hd leaf">                        <a href="Google/Task/Runner.html">Runner</a>                    </div>                </li>                </ul></div>                </li>                            <li data-name="namespace:Google_Utils" class="opened">                    <div style="padding-left:18px" class="hd">                        <span class="glyphicon glyphicon-play"></span><a href="Google/Utils.html">Utils</a>                    </div>                    <div class="bd">                                <ul>                <li data-name="class:Google_Utils_UriTemplate" >                    <div style="padding-left:44px" class="hd leaf">                        <a href="Google/Utils/UriTemplate.html">UriTemplate</a>                    </div>                </li>                </ul></div>                </li>                            <li data-name="class:Google_Client" class="opened">                    <div style="padding-left:26px" class="hd leaf">                        <a href="Google/Client.html">Client</a>                    </div>                </li>                            <li data-name="class:Google_Collection" class="opened">                    <div style="padding-left:26px" class="hd leaf">                        <a href="Google/Collection.html">Collection</a>                    </div>                </li>                            <li data-name="class:Google_Exception" class="opened">                    <div style="padding-left:26px" class="hd leaf">                        <a href="Google/Exception.html">Exception</a>                    </div>                </li>                            <li data-name="class:Google_Model" class="opened">                    <div style="padding-left:26px" class="hd leaf">                        <a href="Google/Model.html">Model</a>                    </div>                </li>                            <li data-name="class:Google_Service" class="opened">                    <div style="padding-left:26px" class="hd leaf">                        <a href="Google/Service.html">Service</a>                    </div>                </li>                </ul></div>                </li>                </ul>';

    var searchTypeClasses = {
        'Namespace': 'label-default',
        'Class': 'label-info',
        'Interface': 'label-primary',
        'Trait': 'label-success',
        'Method': 'label-danger',
        '_': 'label-warning'
    };

    var searchIndex = [
                    
            {"type": "Namespace", "link": "Google.html", "name": "Google", "doc": "Namespace Google"},{"type": "Namespace", "link": "Google/AccessToken.html", "name": "Google\\AccessToken", "doc": "Namespace Google\\AccessToken"},{"type": "Namespace", "link": "Google/AuthHandler.html", "name": "Google\\AuthHandler", "doc": "Namespace Google\\AuthHandler"},{"type": "Namespace", "link": "Google/Http.html", "name": "Google\\Http", "doc": "Namespace Google\\Http"},{"type": "Namespace", "link": "Google/Service.html", "name": "Google\\Service", "doc": "Namespace Google\\Service"},{"type": "Namespace", "link": "Google/Task.html", "name": "Google\\Task", "doc": "Namespace Google\\Task"},{"type": "Namespace", "link": "Google/Utils.html", "name": "Google\\Utils", "doc": "Namespace Google\\Utils"},
            {"type": "Interface", "fromName": "Google\\Task", "fromLink": "Google/Task.html", "link": "Google/Task/Retryable.html", "name": "Google\\Task\\Retryable", "doc": "&quot;Interface for checking how many times a given task can be retried following\na failure.&quot;"},
                    
            
            {"type": "Class", "fromName": "Google\\AccessToken", "fromLink": "Google/AccessToken.html", "link": "Google/AccessToken/Revoke.html", "name": "Google\\AccessToken\\Revoke", "doc": "&quot;Wrapper around Google Access Tokens which provides convenience functions&quot;"},
                                                        {"type": "Method", "fromName": "Google\\AccessToken\\Revoke", "fromLink": "Google/AccessToken/Revoke.html", "link": "Google/AccessToken/Revoke.html#method___construct", "name": "Google\\AccessToken\\Revoke::__construct", "doc": "&quot;Instantiates the class, but does not initiate the login flow, leaving it\nto the discretion of the caller.&quot;"},
                    {"type": "Method", "fromName": "Google\\AccessToken\\Revoke", "fromLink": "Google/AccessToken/Revoke.html", "link": "Google/AccessToken/Revoke.html#method_revokeToken", "name": "Google\\AccessToken\\Revoke::revokeToken", "doc": "&quot;Revoke an OAuth2 access token or refresh token. This method will revoke the current access\ntoken, if a token isn&#039;t provided.&quot;"},
            
            {"type": "Class", "fromName": "Google\\AccessToken", "fromLink": "Google/AccessToken.html", "link": "Google/AccessToken/Verify.html", "name": "Google\\AccessToken\\Verify", "doc": "&quot;Wrapper around Google Access Tokens which provides convenience functions&quot;"},
                                                        {"type": "Method", "fromName": "Google\\AccessToken\\Verify", "fromLink": "Google/AccessToken/Verify.html", "link": "Google/AccessToken/Verify.html#method___construct", "name": "Google\\AccessToken\\Verify::__construct", "doc": "&quot;Instantiates the class, but does not initiate the login flow, leaving it\nto the discretion of the caller.&quot;"},
                    {"type": "Method", "fromName": "Google\\AccessToken\\Verify", "fromLink": "Google/AccessToken/Verify.html", "link": "Google/AccessToken/Verify.html#method_verifyIdToken", "name": "Google\\AccessToken\\Verify::verifyIdToken", "doc": "&quot;Verifies an id token and returns the authenticated apiLoginTicket.&quot;"},
            
            {"type": "Class", "fromName": "Google\\AuthHandler", "fromLink": "Google/AuthHandler.html", "link": "Google/AuthHandler/AuthHandlerFactory.html", "name": "Google\\AuthHandler\\AuthHandlerFactory", "doc": "&quot;&quot;"},
                                                        {"type": "Method", "fromName": "Google\\AuthHandler\\AuthHandlerFactory", "fromLink": "Google/AuthHandler/AuthHandlerFactory.html", "link": "Google/AuthHandler/AuthHandlerFactory.html#method_build", "name": "Google\\AuthHandler\\AuthHandlerFactory::build", "doc": "&quot;Builds out a default http handler for the installed version of guzzle.&quot;"},
            
            {"type": "Class", "fromName": "Google\\AuthHandler", "fromLink": "Google/AuthHandler.html", "link": "Google/AuthHandler/Guzzle5AuthHandler.html", "name": "Google\\AuthHandler\\Guzzle5AuthHandler", "doc": "&quot;&quot;"},
                                                        {"type": "Method", "fromName": "Google\\AuthHandler\\Guzzle5AuthHandler", "fromLink": "Google/AuthHandler/Guzzle5AuthHandler.html", "link": "Google/AuthHandler/Guzzle5AuthHandler.html#method___construct", "name": "Google\\AuthHandler\\Guzzle5AuthHandler::__construct", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Google\\AuthHandler\\Guzzle5AuthHandler", "fromLink": "Google/AuthHandler/Guzzle5AuthHandler.html", "link": "Google/AuthHandler/Guzzle5AuthHandler.html#method_attachCredentials", "name": "Google\\AuthHandler\\Guzzle5AuthHandler::attachCredentials", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Google\\AuthHandler\\Guzzle5AuthHandler", "fromLink": "Google/AuthHandler/Guzzle5AuthHandler.html", "link": "Google/AuthHandler/Guzzle5AuthHandler.html#method_attachToken", "name": "Google\\AuthHandler\\Guzzle5AuthHandler::attachToken", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Google\\AuthHandler\\Guzzle5AuthHandler", "fromLink": "Google/AuthHandler/Guzzle5AuthHandler.html", "link": "Google/AuthHandler/Guzzle5AuthHandler.html#method_attachKey", "name": "Google\\AuthHandler\\Guzzle5AuthHandler::attachKey", "doc": "&quot;&quot;"},
            
            {"type": "Class", "fromName": "Google\\AuthHandler", "fromLink": "Google/AuthHandler.html", "link": "Google/AuthHandler/Guzzle6AuthHandler.html", "name": "Google\\AuthHandler\\Guzzle6AuthHandler", "doc": "&quot;This supports Guzzle 6&quot;"},
                                                        {"type": "Method", "fromName": "Google\\AuthHandler\\Guzzle6AuthHandler", "fromLink": "Google/AuthHandler/Guzzle6AuthHandler.html", "link": "Google/AuthHandler/Guzzle6AuthHandler.html#method___construct", "name": "Google\\AuthHandler\\Guzzle6AuthHandler::__construct", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Google\\AuthHandler\\Guzzle6AuthHandler", "fromLink": "Google/AuthHandler/Guzzle6AuthHandler.html", "link": "Google/AuthHandler/Guzzle6AuthHandler.html#method_attachCredentials", "name": "Google\\AuthHandler\\Guzzle6AuthHandler::attachCredentials", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Google\\AuthHandler\\Guzzle6AuthHandler", "fromLink": "Google/AuthHandler/Guzzle6AuthHandler.html", "link": "Google/AuthHandler/Guzzle6AuthHandler.html#method_attachToken", "name": "Google\\AuthHandler\\Guzzle6AuthHandler::attachToken", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Google\\AuthHandler\\Guzzle6AuthHandler", "fromLink": "Google/AuthHandler/Guzzle6AuthHandler.html", "link": "Google/AuthHandler/Guzzle6AuthHandler.html#method_attachKey", "name": "Google\\AuthHandler\\Guzzle6AuthHandler::attachKey", "doc": "&quot;&quot;"},
            
            {"type": "Class", "fromName": "Google\\AuthHandler", "fromLink": "Google/AuthHandler.html", "link": "Google/AuthHandler/Guzzle7AuthHandler.html", "name": "Google\\AuthHandler\\Guzzle7AuthHandler", "doc": "&quot;This supports Guzzle 7&quot;"},
                    
            {"type": "Class", "fromName": "Google", "fromLink": "Google.html", "link": "Google/Client.html", "name": "Google\\Client", "doc": "&quot;The Google API Client\nhttps:\/\/github.com\/google\/google-api-php-client&quot;"},
                                                        {"type": "Method", "fromName": "Google\\Client", "fromLink": "Google/Client.html", "link": "Google/Client.html#method___construct", "name": "Google\\Client::__construct", "doc": "&quot;Construct the Google Client.&quot;"},
                    {"type": "Method", "fromName": "Google\\Client", "fromLink": "Google/Client.html", "link": "Google/Client.html#method_getLibraryVersion", "name": "Google\\Client::getLibraryVersion", "doc": "&quot;Get a string containing the version of the library.&quot;"},
                    {"type": "Method", "fromName": "Google\\Client", "fromLink": "Google/Client.html", "link": "Google/Client.html#method_authenticate", "name": "Google\\Client::authenticate", "doc": "&quot;For backwards compatibility\nalias for fetchAccessTokenWithAuthCode&quot;"},
                    {"type": "Method", "fromName": "Google\\Client", "fromLink": "Google/Client.html", "link": "Google/Client.html#method_fetchAccessTokenWithAuthCode", "name": "Google\\Client::fetchAccessTokenWithAuthCode", "doc": "&quot;Attempt to exchange a code for an valid authentication token.&quot;"},
                    {"type": "Method", "fromName": "Google\\Client", "fromLink": "Google/Client.html", "link": "Google/Client.html#method_refreshTokenWithAssertion", "name": "Google\\Client::refreshTokenWithAssertion", "doc": "&quot;For backwards compatibility\nalias for fetchAccessTokenWithAssertion&quot;"},
                    {"type": "Method", "fromName": "Google\\Client", "fromLink": "Google/Client.html", "link": "Google/Client.html#method_fetchAccessTokenWithAssertion", "name": "Google\\Client::fetchAccessTokenWithAssertion", "doc": "&quot;Fetches a fresh access token with a given assertion token.&quot;"},
                    {"type": "Method", "fromName": "Google\\Client", "fromLink": "Google/Client.html", "link": "Google/Client.html#method_refreshToken", "name": "Google\\Client::refreshToken", "doc": "&quot;For backwards compatibility\nalias for fetchAccessTokenWithRefreshToken&quot;"},
                    {"type": "Method", "fromName": "Google\\Client", "fromLink": "Google/Client.html", "link": "Google/Client.html#method_fetchAccessTokenWithRefreshToken", "name": "Google\\Client::fetchAccessTokenWithRefreshToken", "doc": "&quot;Fetches a fresh OAuth 2.0 access token with the given refresh token.&quot;"},
                    {"type": "Method", "fromName": "Google\\Client", "fromLink": "Google/Client.html", "link": "Google/Client.html#method_createAuthUrl", "name": "Google\\Client::createAuthUrl", "doc": "&quot;Create a URL to obtain user authorization.&quot;"},
                    {"type": "Method", "fromName": "Google\\Client", "fromLink": "Google/Client.html", "link": "Google/Client.html#method_authorize", "name": "Google\\Client::authorize", "doc": "&quot;Adds auth listeners to the HTTP client based on the credentials\nset in the Google API Client object&quot;"},
                    {"type": "Method", "fromName": "Google\\Client", "fromLink": "Google/Client.html", "link": "Google/Client.html#method_useApplicationDefaultCredentials", "name": "Google\\Client::useApplicationDefaultCredentials", "doc": "&quot;Set the configuration to use application default credentials for\nauthentication&quot;"},
                    {"type": "Method", "fromName": "Google\\Client", "fromLink": "Google/Client.html", "link": "Google/Client.html#method_isUsingApplicationDefaultCredentials", "name": "Google\\Client::isUsingApplicationDefaultCredentials", "doc": "&quot;To prevent useApplicationDefaultCredentials from inappropriately being\ncalled in a conditional&quot;"},
                    {"type": "Method", "fromName": "Google\\Client", "fromLink": "Google/Client.html", "link": "Google/Client.html#method_setAccessToken", "name": "Google\\Client::setAccessToken", "doc": "&quot;Set the access token used for requests.&quot;"},
                    {"type": "Method", "fromName": "Google\\Client", "fromLink": "Google/Client.html", "link": "Google/Client.html#method_getAccessToken", "name": "Google\\Client::getAccessToken", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Google\\Client", "fromLink": "Google/Client.html", "link": "Google/Client.html#method_getRefreshToken", "name": "Google\\Client::getRefreshToken", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Google\\Client", "fromLink": "Google/Client.html", "link": "Google/Client.html#method_isAccessTokenExpired", "name": "Google\\Client::isAccessTokenExpired", "doc": "&quot;Returns if the access_token is expired.&quot;"},
                    {"type": "Method", "fromName": "Google\\Client", "fromLink": "Google/Client.html", "link": "Google/Client.html#method_getAuth", "name": "Google\\Client::getAuth", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Google\\Client", "fromLink": "Google/Client.html", "link": "Google/Client.html#method_setAuth", "name": "Google\\Client::setAuth", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Google\\Client", "fromLink": "Google/Client.html", "link": "Google/Client.html#method_setClientId", "name": "Google\\Client::setClientId", "doc": "&quot;Set the OAuth 2.0 Client ID.&quot;"},
                    {"type": "Method", "fromName": "Google\\Client", "fromLink": "Google/Client.html", "link": "Google/Client.html#method_getClientId", "name": "Google\\Client::getClientId", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Google\\Client", "fromLink": "Google/Client.html", "link": "Google/Client.html#method_setClientSecret", "name": "Google\\Client::setClientSecret", "doc": "&quot;Set the OAuth 2.0 Client Secret.&quot;"},
                    {"type": "Method", "fromName": "Google\\Client", "fromLink": "Google/Client.html", "link": "Google/Client.html#method_getClientSecret", "name": "Google\\Client::getClientSecret", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Google\\Client", "fromLink": "Google/Client.html", "link": "Google/Client.html#method_setRedirectUri", "name": "Google\\Client::setRedirectUri", "doc": "&quot;Set the OAuth 2.0 Redirect URI.&quot;"},
                    {"type": "Method", "fromName": "Google\\Client", "fromLink": "Google/Client.html", "link": "Google/Client.html#method_getRedirectUri", "name": "Google\\Client::getRedirectUri", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Google\\Client", "fromLink": "Google/Client.html", "link": "Google/Client.html#method_setState", "name": "Google\\Client::setState", "doc": "&quot;Set OAuth 2.0 \&quot;state\&quot; parameter to achieve per-request customization.&quot;"},
                    {"type": "Method", "fromName": "Google\\Client", "fromLink": "Google/Client.html", "link": "Google/Client.html#method_setAccessType", "name": "Google\\Client::setAccessType", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Google\\Client", "fromLink": "Google/Client.html", "link": "Google/Client.html#method_setApprovalPrompt", "name": "Google\\Client::setApprovalPrompt", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Google\\Client", "fromLink": "Google/Client.html", "link": "Google/Client.html#method_setLoginHint", "name": "Google\\Client::setLoginHint", "doc": "&quot;Set the login hint, email address or sub id.&quot;"},
                    {"type": "Method", "fromName": "Google\\Client", "fromLink": "Google/Client.html", "link": "Google/Client.html#method_setApplicationName", "name": "Google\\Client::setApplicationName", "doc": "&quot;Set the application name, this is included in the User-Agent HTTP header.&quot;"},
                    {"type": "Method", "fromName": "Google\\Client", "fromLink": "Google/Client.html", "link": "Google/Client.html#method_setRequestVisibleActions", "name": "Google\\Client::setRequestVisibleActions", "doc": "&quot;If &#039;plus.login&#039; is included in the list of requested scopes, you can use\nthis method to define types of app activities that your app will write.&quot;"},
                    {"type": "Method", "fromName": "Google\\Client", "fromLink": "Google/Client.html", "link": "Google/Client.html#method_setDeveloperKey", "name": "Google\\Client::setDeveloperKey", "doc": "&quot;Set the developer key to use, these are obtained through the API Console.&quot;"},
                    {"type": "Method", "fromName": "Google\\Client", "fromLink": "Google/Client.html", "link": "Google/Client.html#method_setHostedDomain", "name": "Google\\Client::setHostedDomain", "doc": "&quot;Set the hd (hosted domain) parameter streamlines the login process for\nGoogle Apps hosted accounts. By including the domain of the user, you\nrestrict sign-in to accounts at that domain.&quot;"},
                    {"type": "Method", "fromName": "Google\\Client", "fromLink": "Google/Client.html", "link": "Google/Client.html#method_setPrompt", "name": "Google\\Client::setPrompt", "doc": "&quot;Set the prompt hint. Valid values are none, consent and select_account.&quot;"},
                    {"type": "Method", "fromName": "Google\\Client", "fromLink": "Google/Client.html", "link": "Google/Client.html#method_setOpenidRealm", "name": "Google\\Client::setOpenidRealm", "doc": "&quot;openid.realm is a parameter from the OpenID 2.0 protocol, not from OAuth\n2.0. It is used in OpenID 2.0 requests to signify the URL-space for which\nan authentication request is valid.&quot;"},
                    {"type": "Method", "fromName": "Google\\Client", "fromLink": "Google/Client.html", "link": "Google/Client.html#method_setIncludeGrantedScopes", "name": "Google\\Client::setIncludeGrantedScopes", "doc": "&quot;If this is provided with the value true, and the authorization request is\ngranted, the authorization will include any previous authorizations\ngranted to this user\/application combination for other scopes.&quot;"},
                    {"type": "Method", "fromName": "Google\\Client", "fromLink": "Google/Client.html", "link": "Google/Client.html#method_setTokenCallback", "name": "Google\\Client::setTokenCallback", "doc": "&quot;sets function to be called when an access token is fetched&quot;"},
                    {"type": "Method", "fromName": "Google\\Client", "fromLink": "Google/Client.html", "link": "Google/Client.html#method_revokeToken", "name": "Google\\Client::revokeToken", "doc": "&quot;Revoke an OAuth2 access token or refresh token. This method will revoke the current access\ntoken, if a token isn&#039;t provided.&quot;"},
                    {"type": "Method", "fromName": "Google\\Client", "fromLink": "Google/Client.html", "link": "Google/Client.html#method_verifyIdToken", "name": "Google\\Client::verifyIdToken", "doc": "&quot;Verify an id_token. This method will verify the current id_token, if one\nisn&#039;t provided.&quot;"},
                    {"type": "Method", "fromName": "Google\\Client", "fromLink": "Google/Client.html", "link": "Google/Client.html#method_setScopes", "name": "Google\\Client::setScopes", "doc": "&quot;Set the scopes to be requested. Must be called before createAuthUrl().&quot;"},
                    {"type": "Method", "fromName": "Google\\Client", "fromLink": "Google/Client.html", "link": "Google/Client.html#method_addScope", "name": "Google\\Client::addScope", "doc": "&quot;This functions adds a scope to be requested as part of the OAuth2.0 flow.&quot;"},
                    {"type": "Method", "fromName": "Google\\Client", "fromLink": "Google/Client.html", "link": "Google/Client.html#method_getScopes", "name": "Google\\Client::getScopes", "doc": "&quot;Returns the list of scopes requested by the client&quot;"},
                    {"type": "Method", "fromName": "Google\\Client", "fromLink": "Google/Client.html", "link": "Google/Client.html#method_prepareScopes", "name": "Google\\Client::prepareScopes", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Google\\Client", "fromLink": "Google/Client.html", "link": "Google/Client.html#method_execute", "name": "Google\\Client::execute", "doc": "&quot;Helper method to execute deferred HTTP requests.&quot;"},
                    {"type": "Method", "fromName": "Google\\Client", "fromLink": "Google/Client.html", "link": "Google/Client.html#method_setUseBatch", "name": "Google\\Client::setUseBatch", "doc": "&quot;Declare whether batch calls should be used. This may increase throughput\nby making multiple requests in one connection.&quot;"},
                    {"type": "Method", "fromName": "Google\\Client", "fromLink": "Google/Client.html", "link": "Google/Client.html#method_isAppEngine", "name": "Google\\Client::isAppEngine", "doc": "&quot;Are we running in Google AppEngine?\nreturn bool&quot;"},
                    {"type": "Method", "fromName": "Google\\Client", "fromLink": "Google/Client.html", "link": "Google/Client.html#method_setConfig", "name": "Google\\Client::setConfig", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Google\\Client", "fromLink": "Google/Client.html", "link": "Google/Client.html#method_getConfig", "name": "Google\\Client::getConfig", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Google\\Client", "fromLink": "Google/Client.html", "link": "Google/Client.html#method_setAuthConfigFile", "name": "Google\\Client::setAuthConfigFile", "doc": "&quot;For backwards compatibility\nalias for setAuthConfig&quot;"},
                    {"type": "Method", "fromName": "Google\\Client", "fromLink": "Google/Client.html", "link": "Google/Client.html#method_setAuthConfig", "name": "Google\\Client::setAuthConfig", "doc": "&quot;Set the auth config from new or deprecated JSON config.&quot;"},
                    {"type": "Method", "fromName": "Google\\Client", "fromLink": "Google/Client.html", "link": "Google/Client.html#method_setSubject", "name": "Google\\Client::setSubject", "doc": "&quot;Use when the service account has been delegated domain wide access.&quot;"},
                    {"type": "Method", "fromName": "Google\\Client", "fromLink": "Google/Client.html", "link": "Google/Client.html#method_setDefer", "name": "Google\\Client::setDefer", "doc": "&quot;Declare whether making API calls should make the call immediately, or\nreturn a request which can be called with -&gt;execute();&quot;"},
                    {"type": "Method", "fromName": "Google\\Client", "fromLink": "Google/Client.html", "link": "Google/Client.html#method_shouldDefer", "name": "Google\\Client::shouldDefer", "doc": "&quot;Whether or not to return raw requests&quot;"},
                    {"type": "Method", "fromName": "Google\\Client", "fromLink": "Google/Client.html", "link": "Google/Client.html#method_getOAuth2Service", "name": "Google\\Client::getOAuth2Service", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Google\\Client", "fromLink": "Google/Client.html", "link": "Google/Client.html#method_createOAuth2Service", "name": "Google\\Client::createOAuth2Service", "doc": "&quot;create a default google auth object&quot;"},
                    {"type": "Method", "fromName": "Google\\Client", "fromLink": "Google/Client.html", "link": "Google/Client.html#method_setCache", "name": "Google\\Client::setCache", "doc": "&quot;Set the Cache object&quot;"},
                    {"type": "Method", "fromName": "Google\\Client", "fromLink": "Google/Client.html", "link": "Google/Client.html#method_getCache", "name": "Google\\Client::getCache", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Google\\Client", "fromLink": "Google/Client.html", "link": "Google/Client.html#method_setCacheConfig", "name": "Google\\Client::setCacheConfig", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Google\\Client", "fromLink": "Google/Client.html", "link": "Google/Client.html#method_setLogger", "name": "Google\\Client::setLogger", "doc": "&quot;Set the Logger object&quot;"},
                    {"type": "Method", "fromName": "Google\\Client", "fromLink": "Google/Client.html", "link": "Google/Client.html#method_getLogger", "name": "Google\\Client::getLogger", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Google\\Client", "fromLink": "Google/Client.html", "link": "Google/Client.html#method_createDefaultLogger", "name": "Google\\Client::createDefaultLogger", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Google\\Client", "fromLink": "Google/Client.html", "link": "Google/Client.html#method_createDefaultCache", "name": "Google\\Client::createDefaultCache", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Google\\Client", "fromLink": "Google/Client.html", "link": "Google/Client.html#method_setHttpClient", "name": "Google\\Client::setHttpClient", "doc": "&quot;Set the Http Client object&quot;"},
                    {"type": "Method", "fromName": "Google\\Client", "fromLink": "Google/Client.html", "link": "Google/Client.html#method_getHttpClient", "name": "Google\\Client::getHttpClient", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Google\\Client", "fromLink": "Google/Client.html", "link": "Google/Client.html#method_setApiFormatV2", "name": "Google\\Client::setApiFormatV2", "doc": "&quot;Set the API format version.&quot;"},
                    {"type": "Method", "fromName": "Google\\Client", "fromLink": "Google/Client.html", "link": "Google/Client.html#method_createDefaultHttpClient", "name": "Google\\Client::createDefaultHttpClient", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Google\\Client", "fromLink": "Google/Client.html", "link": "Google/Client.html#method_getAuthHandler", "name": "Google\\Client::getAuthHandler", "doc": "&quot;&quot;"},
            
            {"type": "Class", "fromName": "Google", "fromLink": "Google.html", "link": "Google/Collection.html", "name": "Google\\Collection", "doc": "&quot;Extension to the regular Google\\Model that automatically\nexposes the items array for iteration, so you can just\niterate over the object rather than a reference inside.&quot;"},
                                                        {"type": "Method", "fromName": "Google\\Collection", "fromLink": "Google/Collection.html", "link": "Google/Collection.html#method_rewind", "name": "Google\\Collection::rewind", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Google\\Collection", "fromLink": "Google/Collection.html", "link": "Google/Collection.html#method_current", "name": "Google\\Collection::current", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Google\\Collection", "fromLink": "Google/Collection.html", "link": "Google/Collection.html#method_key", "name": "Google\\Collection::key", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Google\\Collection", "fromLink": "Google/Collection.html", "link": "Google/Collection.html#method_next", "name": "Google\\Collection::next", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Google\\Collection", "fromLink": "Google/Collection.html", "link": "Google/Collection.html#method_valid", "name": "Google\\Collection::valid", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Google\\Collection", "fromLink": "Google/Collection.html", "link": "Google/Collection.html#method_count", "name": "Google\\Collection::count", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Google\\Collection", "fromLink": "Google/Collection.html", "link": "Google/Collection.html#method_offsetExists", "name": "Google\\Collection::offsetExists", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Google\\Collection", "fromLink": "Google/Collection.html", "link": "Google/Collection.html#method_offsetGet", "name": "Google\\Collection::offsetGet", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Google\\Collection", "fromLink": "Google/Collection.html", "link": "Google/Collection.html#method_offsetSet", "name": "Google\\Collection::offsetSet", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Google\\Collection", "fromLink": "Google/Collection.html", "link": "Google/Collection.html#method_offsetUnset", "name": "Google\\Collection::offsetUnset", "doc": "&quot;&quot;"},
            
            {"type": "Class", "fromName": "Google", "fromLink": "Google.html", "link": "Google/Exception.html", "name": "Google\\Exception", "doc": "&quot;&quot;"},
                    
            {"type": "Class", "fromName": "Google\\Http", "fromLink": "Google/Http.html", "link": "Google/Http/Batch.html", "name": "Google\\Http\\Batch", "doc": "&quot;Class to handle batched requests to the Google API service.&quot;"},
                                                        {"type": "Method", "fromName": "Google\\Http\\Batch", "fromLink": "Google/Http/Batch.html", "link": "Google/Http/Batch.html#method___construct", "name": "Google\\Http\\Batch::__construct", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Google\\Http\\Batch", "fromLink": "Google/Http/Batch.html", "link": "Google/Http/Batch.html#method_add", "name": "Google\\Http\\Batch::add", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Google\\Http\\Batch", "fromLink": "Google/Http/Batch.html", "link": "Google/Http/Batch.html#method_execute", "name": "Google\\Http\\Batch::execute", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Google\\Http\\Batch", "fromLink": "Google/Http/Batch.html", "link": "Google/Http/Batch.html#method_parseResponse", "name": "Google\\Http\\Batch::parseResponse", "doc": "&quot;&quot;"},
            
            {"type": "Class", "fromName": "Google\\Http", "fromLink": "Google/Http.html", "link": "Google/Http/MediaFileUpload.html", "name": "Google\\Http\\MediaFileUpload", "doc": "&quot;Manage large file uploads, which may be media but can be any type\nof sizable data.&quot;"},
                                                        {"type": "Method", "fromName": "Google\\Http\\MediaFileUpload", "fromLink": "Google/Http/MediaFileUpload.html", "link": "Google/Http/MediaFileUpload.html#method___construct", "name": "Google\\Http\\MediaFileUpload::__construct", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Google\\Http\\MediaFileUpload", "fromLink": "Google/Http/MediaFileUpload.html", "link": "Google/Http/MediaFileUpload.html#method_setFileSize", "name": "Google\\Http\\MediaFileUpload::setFileSize", "doc": "&quot;Set the size of the file that is being uploaded.&quot;"},
                    {"type": "Method", "fromName": "Google\\Http\\MediaFileUpload", "fromLink": "Google/Http/MediaFileUpload.html", "link": "Google/Http/MediaFileUpload.html#method_getProgress", "name": "Google\\Http\\MediaFileUpload::getProgress", "doc": "&quot;Return the progress on the upload&quot;"},
                    {"type": "Method", "fromName": "Google\\Http\\MediaFileUpload", "fromLink": "Google/Http/MediaFileUpload.html", "link": "Google/Http/MediaFileUpload.html#method_nextChunk", "name": "Google\\Http\\MediaFileUpload::nextChunk", "doc": "&quot;Send the next part of the file to upload.&quot;"},
                    {"type": "Method", "fromName": "Google\\Http\\MediaFileUpload", "fromLink": "Google/Http/MediaFileUpload.html", "link": "Google/Http/MediaFileUpload.html#method_getHttpResultCode", "name": "Google\\Http\\MediaFileUpload::getHttpResultCode", "doc": "&quot;Return the HTTP result code from the last call made.&quot;"},
                    {"type": "Method", "fromName": "Google\\Http\\MediaFileUpload", "fromLink": "Google/Http/MediaFileUpload.html", "link": "Google/Http/MediaFileUpload.html#method_resume", "name": "Google\\Http\\MediaFileUpload::resume", "doc": "&quot;Resume a previously unfinished upload&quot;"},
                    {"type": "Method", "fromName": "Google\\Http\\MediaFileUpload", "fromLink": "Google/Http/MediaFileUpload.html", "link": "Google/Http/MediaFileUpload.html#method_getUploadType", "name": "Google\\Http\\MediaFileUpload::getUploadType", "doc": "&quot;Valid upload types:\n- resumable (UPLOAD_RESUMABLE_TYPE)\n- media (UPLOAD_MEDIA_TYPE)\n- multipart (UPLOAD_MULTIPART_TYPE)&quot;"},
                    {"type": "Method", "fromName": "Google\\Http\\MediaFileUpload", "fromLink": "Google/Http/MediaFileUpload.html", "link": "Google/Http/MediaFileUpload.html#method_getResumeUri", "name": "Google\\Http\\MediaFileUpload::getResumeUri", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Google\\Http\\MediaFileUpload", "fromLink": "Google/Http/MediaFileUpload.html", "link": "Google/Http/MediaFileUpload.html#method_setChunkSize", "name": "Google\\Http\\MediaFileUpload::setChunkSize", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Google\\Http\\MediaFileUpload", "fromLink": "Google/Http/MediaFileUpload.html", "link": "Google/Http/MediaFileUpload.html#method_getRequest", "name": "Google\\Http\\MediaFileUpload::getRequest", "doc": "&quot;&quot;"},
            
            {"type": "Class", "fromName": "Google\\Http", "fromLink": "Google/Http.html", "link": "Google/Http/REST.html", "name": "Google\\Http\\REST", "doc": "&quot;This class implements the RESTful transport of apiServiceRequest()&#039;s&quot;"},
                                                        {"type": "Method", "fromName": "Google\\Http\\REST", "fromLink": "Google/Http/REST.html", "link": "Google/Http/REST.html#method_execute", "name": "Google\\Http\\REST::execute", "doc": "&quot;Executes a Psr\\Http\\Message\\RequestInterface and (if applicable) automatically retries\nwhen errors occur.&quot;"},
                    {"type": "Method", "fromName": "Google\\Http\\REST", "fromLink": "Google/Http/REST.html", "link": "Google/Http/REST.html#method_doExecute", "name": "Google\\Http\\REST::doExecute", "doc": "&quot;Executes a Psr\\Http\\Message\\RequestInterface&quot;"},
                    {"type": "Method", "fromName": "Google\\Http\\REST", "fromLink": "Google/Http/REST.html", "link": "Google/Http/REST.html#method_decodeHttpResponse", "name": "Google\\Http\\REST::decodeHttpResponse", "doc": "&quot;Decode an HTTP Response.&quot;"},
            
            {"type": "Class", "fromName": "Google", "fromLink": "Google.html", "link": "Google/Model.html", "name": "Google\\Model", "doc": "&quot;This class defines attributes, valid values, and usage which is generated\nfrom a given json schema.&quot;"},
                                                        {"type": "Method", "fromName": "Google\\Model", "fromLink": "Google/Model.html", "link": "Google/Model.html#method___construct", "name": "Google\\Model::__construct", "doc": "&quot;Polymorphic - accepts a variable number of arguments dependent\non the type of the model subclass.&quot;"},
                    {"type": "Method", "fromName": "Google\\Model", "fromLink": "Google/Model.html", "link": "Google/Model.html#method___get", "name": "Google\\Model::__get", "doc": "&quot;Getter that handles passthrough access to the data array, and lazy object creation.&quot;"},
                    {"type": "Method", "fromName": "Google\\Model", "fromLink": "Google/Model.html", "link": "Google/Model.html#method_mapTypes", "name": "Google\\Model::mapTypes", "doc": "&quot;Initialize this object&#039;s properties from an array.&quot;"},
                    {"type": "Method", "fromName": "Google\\Model", "fromLink": "Google/Model.html", "link": "Google/Model.html#method_gapiInit", "name": "Google\\Model::gapiInit", "doc": "&quot;Blank initialiser to be used in subclasses to do  post-construction initialisation - this\navoids the need for subclasses to have to implement the variadics handling in their\nconstructors.&quot;"},
                    {"type": "Method", "fromName": "Google\\Model", "fromLink": "Google/Model.html", "link": "Google/Model.html#method_toSimpleObject", "name": "Google\\Model::toSimpleObject", "doc": "&quot;Create a simplified object suitable for straightforward\nconversion to JSON. This is relatively expensive\ndue to the usage of reflection, but shouldn&#039;t be called\na whole lot, and is the most straightforward way to filter.&quot;"},
                    {"type": "Method", "fromName": "Google\\Model", "fromLink": "Google/Model.html", "link": "Google/Model.html#method_isAssociativeArray", "name": "Google\\Model::isAssociativeArray", "doc": "&quot;Returns true only if the array is associative.&quot;"},
                    {"type": "Method", "fromName": "Google\\Model", "fromLink": "Google/Model.html", "link": "Google/Model.html#method_assertIsArray", "name": "Google\\Model::assertIsArray", "doc": "&quot;Verify if $obj is an array.&quot;"},
                    {"type": "Method", "fromName": "Google\\Model", "fromLink": "Google/Model.html", "link": "Google/Model.html#method_offsetExists", "name": "Google\\Model::offsetExists", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Google\\Model", "fromLink": "Google/Model.html", "link": "Google/Model.html#method_offsetGet", "name": "Google\\Model::offsetGet", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Google\\Model", "fromLink": "Google/Model.html", "link": "Google/Model.html#method_offsetSet", "name": "Google\\Model::offsetSet", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Google\\Model", "fromLink": "Google/Model.html", "link": "Google/Model.html#method_offsetUnset", "name": "Google\\Model::offsetUnset", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Google\\Model", "fromLink": "Google/Model.html", "link": "Google/Model.html#method_keyType", "name": "Google\\Model::keyType", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Google\\Model", "fromLink": "Google/Model.html", "link": "Google/Model.html#method_dataType", "name": "Google\\Model::dataType", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Google\\Model", "fromLink": "Google/Model.html", "link": "Google/Model.html#method___isset", "name": "Google\\Model::__isset", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Google\\Model", "fromLink": "Google/Model.html", "link": "Google/Model.html#method___unset", "name": "Google\\Model::__unset", "doc": "&quot;&quot;"},
            
            {"type": "Class", "fromName": "Google", "fromLink": "Google.html", "link": "Google/Service.html", "name": "Google\\Service", "doc": "&quot;&quot;"},
                                                        {"type": "Method", "fromName": "Google\\Service", "fromLink": "Google/Service.html", "link": "Google/Service.html#method___construct", "name": "Google\\Service::__construct", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Google\\Service", "fromLink": "Google/Service.html", "link": "Google/Service.html#method_getClient", "name": "Google\\Service::getClient", "doc": "&quot;Return the associated Google\\Client class.&quot;"},
                    {"type": "Method", "fromName": "Google\\Service", "fromLink": "Google/Service.html", "link": "Google/Service.html#method_createBatch", "name": "Google\\Service::createBatch", "doc": "&quot;Create a new HTTP Batch handler for this service&quot;"},
            
            {"type": "Class", "fromName": "Google\\Service", "fromLink": "Google/Service.html", "link": "Google/Service/Exception.html", "name": "Google\\Service\\Exception", "doc": "&quot;&quot;"},
                                                        {"type": "Method", "fromName": "Google\\Service\\Exception", "fromLink": "Google/Service/Exception.html", "link": "Google/Service/Exception.html#method___construct", "name": "Google\\Service\\Exception::__construct", "doc": "&quot;Override default constructor to add the ability to set $errors and a retry\nmap.&quot;"},
                    {"type": "Method", "fromName": "Google\\Service\\Exception", "fromLink": "Google/Service/Exception.html", "link": "Google/Service/Exception.html#method_getErrors", "name": "Google\\Service\\Exception::getErrors", "doc": "&quot;An example of the possible errors returned.&quot;"},
            
            {"type": "Class", "fromName": "Google\\Service", "fromLink": "Google/Service.html", "link": "Google/Service/Resource.html", "name": "Google\\Service\\Resource", "doc": "&quot;Implements the actual methods\/resources of the discovered Google API using magic function\ncalling overloading (__call()), which on call will see if the method name (plus.activities.list)\nis available in this service, and if so construct an apiHttpRequest representing it.&quot;"},
                                                        {"type": "Method", "fromName": "Google\\Service\\Resource", "fromLink": "Google/Service/Resource.html", "link": "Google/Service/Resource.html#method___construct", "name": "Google\\Service\\Resource::__construct", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Google\\Service\\Resource", "fromLink": "Google/Service/Resource.html", "link": "Google/Service/Resource.html#method_call", "name": "Google\\Service\\Resource::call", "doc": "&quot;TODO: This function needs simplifying.&quot;"},
                    {"type": "Method", "fromName": "Google\\Service\\Resource", "fromLink": "Google/Service/Resource.html", "link": "Google/Service/Resource.html#method_convertToArrayAndStripNulls", "name": "Google\\Service\\Resource::convertToArrayAndStripNulls", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Google\\Service\\Resource", "fromLink": "Google/Service/Resource.html", "link": "Google/Service/Resource.html#method_createRequestUri", "name": "Google\\Service\\Resource::createRequestUri", "doc": "&quot;Parse\/expand request parameters and create a fully qualified\nrequest uri.&quot;"},
            
            {"type": "Class", "fromName": "Google\\Task", "fromLink": "Google/Task.html", "link": "Google/Task/Composer.html", "name": "Google\\Task\\Composer", "doc": "&quot;&quot;"},
                                                        {"type": "Method", "fromName": "Google\\Task\\Composer", "fromLink": "Google/Task/Composer.html", "link": "Google/Task/Composer.html#method_cleanup", "name": "Google\\Task\\Composer::cleanup", "doc": "&quot;&quot;"},
            
            {"type": "Class", "fromName": "Google\\Task", "fromLink": "Google/Task.html", "link": "Google/Task/Exception.html", "name": "Google\\Task\\Exception", "doc": "&quot;&quot;"},
                    
            {"type": "Class", "fromName": "Google\\Task", "fromLink": "Google/Task.html", "link": "Google/Task/Retryable.html", "name": "Google\\Task\\Retryable", "doc": "&quot;Interface for checking how many times a given task can be retried following\na failure.&quot;"},
                    
            {"type": "Class", "fromName": "Google\\Task", "fromLink": "Google/Task.html", "link": "Google/Task/Runner.html", "name": "Google\\Task\\Runner", "doc": "&quot;A task runner with exponential backoff support.&quot;"},
                                                        {"type": "Method", "fromName": "Google\\Task\\Runner", "fromLink": "Google/Task/Runner.html", "link": "Google/Task/Runner.html#method___construct", "name": "Google\\Task\\Runner::__construct", "doc": "&quot;Creates a new task runner with exponential backoff support.&quot;"},
                    {"type": "Method", "fromName": "Google\\Task\\Runner", "fromLink": "Google/Task/Runner.html", "link": "Google/Task/Runner.html#method_canAttempt", "name": "Google\\Task\\Runner::canAttempt", "doc": "&quot;Checks if a retry can be attempted.&quot;"},
                    {"type": "Method", "fromName": "Google\\Task\\Runner", "fromLink": "Google/Task/Runner.html", "link": "Google/Task/Runner.html#method_run", "name": "Google\\Task\\Runner::run", "doc": "&quot;Runs the task and (if applicable) automatically retries when errors occur.&quot;"},
                    {"type": "Method", "fromName": "Google\\Task\\Runner", "fromLink": "Google/Task/Runner.html", "link": "Google/Task/Runner.html#method_attempt", "name": "Google\\Task\\Runner::attempt", "doc": "&quot;Runs a task once, if possible. This is useful for bypassing the &lt;code&gt;run()&lt;\/code&gt;\nloop.&quot;"},
                    {"type": "Method", "fromName": "Google\\Task\\Runner", "fromLink": "Google/Task/Runner.html", "link": "Google/Task/Runner.html#method_allowedRetries", "name": "Google\\Task\\Runner::allowedRetries", "doc": "&quot;Gets the number of times the associated task can be retried.&quot;"},
                    {"type": "Method", "fromName": "Google\\Task\\Runner", "fromLink": "Google/Task/Runner.html", "link": "Google/Task/Runner.html#method_setRetryMap", "name": "Google\\Task\\Runner::setRetryMap", "doc": "&quot;&quot;"},
            
            {"type": "Class", "fromName": "Google\\Utils", "fromLink": "Google/Utils.html", "link": "Google/Utils/UriTemplate.html", "name": "Google\\Utils\\UriTemplate", "doc": "&quot;Implementation of levels 1-3 of the URI Template spec.&quot;"},
                                                        {"type": "Method", "fromName": "Google\\Utils\\UriTemplate", "fromLink": "Google/Utils/UriTemplate.html", "link": "Google/Utils/UriTemplate.html#method_parse", "name": "Google\\Utils\\UriTemplate::parse", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Google\\Utils\\UriTemplate", "fromLink": "Google/Utils/UriTemplate.html", "link": "Google/Utils/UriTemplate.html#method_combine", "name": "Google\\Utils\\UriTemplate::combine", "doc": "&quot;&quot;"},
            
            
                                        // Fix trailing commas in the index
        {}
    ];

    /** Tokenizes strings by namespaces and functions */
    function tokenizer(term) {
        if (!term) {
            return [];
        }

        var tokens = [term];
        var meth = term.indexOf('::');

        // Split tokens into methods if "::" is found.
        if (meth > -1) {
            tokens.push(term.substr(meth + 2));
            term = term.substr(0, meth - 2);
        }

        // Split by namespace or fake namespace.
        if (term.indexOf('\\') > -1) {
            tokens = tokens.concat(term.split('\\'));
        } else if (term.indexOf('_') > 0) {
            tokens = tokens.concat(term.split('_'));
        }

        // Merge in splitting the string by case and return
        tokens = tokens.concat(term.match(/(([A-Z]?[^A-Z]*)|([a-z]?[^a-z]*))/g).slice(0,-1));

        return tokens;
    };

    root.Sami = {
        /**
         * Cleans the provided term. If no term is provided, then one is
         * grabbed from the query string "search" parameter.
         */
        cleanSearchTerm: function(term) {
            // Grab from the query string
            if (typeof term === 'undefined') {
                var name = 'search';
                var regex = new RegExp("[\\?&]" + name + "=([^&#]*)");
                var results = regex.exec(location.search);
                if (results === null) {
                    return null;
                }
                term = decodeURIComponent(results[1].replace(/\+/g, " "));
            }

            return term.replace(/<(?:.|\n)*?>/gm, '');
        },

        /** Searches through the index for a given term */
        search: function(term) {
            // Create a new search index if needed
            if (!bhIndex) {
                bhIndex = new Bloodhound({
                    limit: 500,
                    local: searchIndex,
                    datumTokenizer: function (d) {
                        return tokenizer(d.name);
                    },
                    queryTokenizer: Bloodhound.tokenizers.whitespace
                });
                bhIndex.initialize();
            }

            results = [];
            bhIndex.get(term, function(matches) {
                results = matches;
            });

            if (!rootPath) {
                return results;
            }

            // Fix the element links based on the current page depth.
            return $.map(results, function(ele) {
                if (ele.link.indexOf('..') > -1) {
                    return ele;
                }
                ele.link = rootPath + ele.link;
                if (ele.fromLink) {
                    ele.fromLink = rootPath + ele.fromLink;
                }
                return ele;
            });
        },

        /** Get a search class for a specific type */
        getSearchClass: function(type) {
            return searchTypeClasses[type] || searchTypeClasses['_'];
        },

        /** Add the left-nav tree to the site */
        injectApiTree: function(ele) {
            ele.html(treeHtml);
        }
    };

    $(function() {
        // Modify the HTML to work correctly based on the current depth
        rootPath = $('body').attr('data-root-path');
        treeHtml = treeHtml.replace(/href="/g, 'href="' + rootPath);
        Sami.injectApiTree($('#api-tree'));
    });

    return root.Sami;
})(window);

$(function() {

    // Enable the version switcher
    $('#version-switcher').change(function() {
        window.location = $(this).val()
    });

    
        // Toggle left-nav divs on click
        $('#api-tree .hd span').click(function() {
            $(this).parent().parent().toggleClass('opened');
        });

        // Expand the parent namespaces of the current page.
        var expected = $('body').attr('data-name');

        if (expected) {
            // Open the currently selected node and its parents.
            var container = $('#api-tree');
            var node = $('#api-tree li[data-name="' + expected + '"]');
            // Node might not be found when simulating namespaces
            if (node.length > 0) {
                node.addClass('active').addClass('opened');
                node.parents('li').addClass('opened');
                var scrollPos = node.offset().top - container.offset().top + container.scrollTop();
                // Position the item nearer to the top of the screen.
                scrollPos -= 200;
                container.scrollTop(scrollPos);
            }
        }

    
    
        var form = $('#search-form .typeahead');
        form.typeahead({
            hint: true,
            highlight: true,
            minLength: 1
        }, {
            name: 'search',
            displayKey: 'name',
            source: function (q, cb) {
                cb(Sami.search(q));
            }
        });

        // The selection is direct-linked when the user selects a suggestion.
        form.on('typeahead:selected', function(e, suggestion) {
            window.location = suggestion.link;
        });

        // The form is submitted when the user hits enter.
        form.keypress(function (e) {
            if (e.which == 13) {
                $('#search-form').submit();
                return true;
            }
        });

    
});



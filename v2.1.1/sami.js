
window.projectVersion = 'v2.1.1';

(function(root) {

    var bhIndex = null;
    var rootPath = '';
    var treeHtml = '        <ul>                <li data-name="namespace:" class="opened">                    <div style="padding-left:0px" class="hd">                        <span class="glyphicon glyphicon-play"></span><a href=".html">[Global Namespace]</a>                    </div>                    <div class="bd">                                <ul>                <li data-name="class:Google_AccessToken_Revoke" class="opened">                    <div style="padding-left:26px" class="hd leaf">                        <a href="Google_AccessToken_Revoke.html">Google_AccessToken_Revoke</a>                    </div>                </li>                            <li data-name="class:Google_AccessToken_Verify" class="opened">                    <div style="padding-left:26px" class="hd leaf">                        <a href="Google_AccessToken_Verify.html">Google_AccessToken_Verify</a>                    </div>                </li>                            <li data-name="class:Google_AuthHandler_AuthHandlerFactory" class="opened">                    <div style="padding-left:26px" class="hd leaf">                        <a href="Google_AuthHandler_AuthHandlerFactory.html">Google_AuthHandler_AuthHandlerFactory</a>                    </div>                </li>                            <li data-name="class:Google_AuthHandler_Guzzle5AuthHandler" class="opened">                    <div style="padding-left:26px" class="hd leaf">                        <a href="Google_AuthHandler_Guzzle5AuthHandler.html">Google_AuthHandler_Guzzle5AuthHandler</a>                    </div>                </li>                            <li data-name="class:Google_AuthHandler_Guzzle6AuthHandler" class="opened">                    <div style="padding-left:26px" class="hd leaf">                        <a href="Google_AuthHandler_Guzzle6AuthHandler.html">Google_AuthHandler_Guzzle6AuthHandler</a>                    </div>                </li>                            <li data-name="class:Google_Client" class="opened">                    <div style="padding-left:26px" class="hd leaf">                        <a href="Google_Client.html">Google_Client</a>                    </div>                </li>                            <li data-name="class:Google_Collection" class="opened">                    <div style="padding-left:26px" class="hd leaf">                        <a href="Google_Collection.html">Google_Collection</a>                    </div>                </li>                            <li data-name="class:Google_Exception" class="opened">                    <div style="padding-left:26px" class="hd leaf">                        <a href="Google_Exception.html">Google_Exception</a>                    </div>                </li>                            <li data-name="class:Google_Http_Batch" class="opened">                    <div style="padding-left:26px" class="hd leaf">                        <a href="Google_Http_Batch.html">Google_Http_Batch</a>                    </div>                </li>                            <li data-name="class:Google_Http_MediaFileUpload" class="opened">                    <div style="padding-left:26px" class="hd leaf">                        <a href="Google_Http_MediaFileUpload.html">Google_Http_MediaFileUpload</a>                    </div>                </li>                            <li data-name="class:Google_Http_REST" class="opened">                    <div style="padding-left:26px" class="hd leaf">                        <a href="Google_Http_REST.html">Google_Http_REST</a>                    </div>                </li>                            <li data-name="class:Google_Model" class="opened">                    <div style="padding-left:26px" class="hd leaf">                        <a href="Google_Model.html">Google_Model</a>                    </div>                </li>                            <li data-name="class:Google_Service" class="opened">                    <div style="padding-left:26px" class="hd leaf">                        <a href="Google_Service.html">Google_Service</a>                    </div>                </li>                            <li data-name="class:Google_Service_Exception" class="opened">                    <div style="padding-left:26px" class="hd leaf">                        <a href="Google_Service_Exception.html">Google_Service_Exception</a>                    </div>                </li>                            <li data-name="class:Google_Service_Resource" class="opened">                    <div style="padding-left:26px" class="hd leaf">                        <a href="Google_Service_Resource.html">Google_Service_Resource</a>                    </div>                </li>                            <li data-name="class:Google_Task_Exception" class="opened">                    <div style="padding-left:26px" class="hd leaf">                        <a href="Google_Task_Exception.html">Google_Task_Exception</a>                    </div>                </li>                            <li data-name="class:Google_Task_Retryable" class="opened">                    <div style="padding-left:26px" class="hd leaf">                        <a href="Google_Task_Retryable.html">Google_Task_Retryable</a>                    </div>                </li>                            <li data-name="class:Google_Task_Runner" class="opened">                    <div style="padding-left:26px" class="hd leaf">                        <a href="Google_Task_Runner.html">Google_Task_Runner</a>                    </div>                </li>                            <li data-name="class:Google_Utils_UriTemplate" class="opened">                    <div style="padding-left:26px" class="hd leaf">                        <a href="Google_Utils_UriTemplate.html">Google_Utils_UriTemplate</a>                    </div>                </li>                </ul></div>                </li>                </ul>';

    var searchTypeClasses = {
        'Namespace': 'label-default',
        'Class': 'label-info',
        'Interface': 'label-primary',
        'Trait': 'label-success',
        'Method': 'label-danger',
        '_': 'label-warning'
    };

    var searchIndex = [
                    
            {"type": "Namespace", "link": ".html", "name": "", "doc": "Namespace "},
            {"type": "Interface",  "link": "Google_Task_Retryable.html", "name": "Google_Task_Retryable", "doc": "&quot;Interface for checking how many times a given task can be retried following\na failure.&quot;"},
                    
            
            {"type": "Class",  "link": "Google_AccessToken_Revoke.html", "name": "Google_AccessToken_Revoke", "doc": "&quot;Wrapper around Google Access Tokens which provides convenience functions&quot;"},
                                                        {"type": "Method", "fromName": "Google_AccessToken_Revoke", "fromLink": "Google_AccessToken_Revoke.html", "link": "Google_AccessToken_Revoke.html#method___construct", "name": "Google_AccessToken_Revoke::__construct", "doc": "&quot;Instantiates the class, but does not initiate the login flow, leaving it\nto the discretion of the caller.&quot;"},
                    {"type": "Method", "fromName": "Google_AccessToken_Revoke", "fromLink": "Google_AccessToken_Revoke.html", "link": "Google_AccessToken_Revoke.html#method_revokeToken", "name": "Google_AccessToken_Revoke::revokeToken", "doc": "&quot;Revoke an OAuth2 access token or refresh token. This method will revoke the current access\ntoken, if a token isn&#039;t provided.&quot;"},
            
            {"type": "Class",  "link": "Google_AccessToken_Verify.html", "name": "Google_AccessToken_Verify", "doc": "&quot;Wrapper around Google Access Tokens which provides convenience functions&quot;"},
                                                        {"type": "Method", "fromName": "Google_AccessToken_Verify", "fromLink": "Google_AccessToken_Verify.html", "link": "Google_AccessToken_Verify.html#method___construct", "name": "Google_AccessToken_Verify::__construct", "doc": "&quot;Instantiates the class, but does not initiate the login flow, leaving it\nto the discretion of the caller.&quot;"},
                    {"type": "Method", "fromName": "Google_AccessToken_Verify", "fromLink": "Google_AccessToken_Verify.html", "link": "Google_AccessToken_Verify.html#method_verifyIdToken", "name": "Google_AccessToken_Verify::verifyIdToken", "doc": "&quot;Verifies an id token and returns the authenticated apiLoginTicket.&quot;"},
            
            {"type": "Class",  "link": "Google_AuthHandler_AuthHandlerFactory.html", "name": "Google_AuthHandler_AuthHandlerFactory", "doc": "&quot;&quot;"},
                                                        {"type": "Method", "fromName": "Google_AuthHandler_AuthHandlerFactory", "fromLink": "Google_AuthHandler_AuthHandlerFactory.html", "link": "Google_AuthHandler_AuthHandlerFactory.html#method_build", "name": "Google_AuthHandler_AuthHandlerFactory::build", "doc": "&quot;Builds out a default http handler for the installed version of guzzle.&quot;"},
            
            {"type": "Class",  "link": "Google_AuthHandler_Guzzle5AuthHandler.html", "name": "Google_AuthHandler_Guzzle5AuthHandler", "doc": "&quot;&quot;"},
                                                        {"type": "Method", "fromName": "Google_AuthHandler_Guzzle5AuthHandler", "fromLink": "Google_AuthHandler_Guzzle5AuthHandler.html", "link": "Google_AuthHandler_Guzzle5AuthHandler.html#method___construct", "name": "Google_AuthHandler_Guzzle5AuthHandler::__construct", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Google_AuthHandler_Guzzle5AuthHandler", "fromLink": "Google_AuthHandler_Guzzle5AuthHandler.html", "link": "Google_AuthHandler_Guzzle5AuthHandler.html#method_attachCredentials", "name": "Google_AuthHandler_Guzzle5AuthHandler::attachCredentials", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Google_AuthHandler_Guzzle5AuthHandler", "fromLink": "Google_AuthHandler_Guzzle5AuthHandler.html", "link": "Google_AuthHandler_Guzzle5AuthHandler.html#method_attachToken", "name": "Google_AuthHandler_Guzzle5AuthHandler::attachToken", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Google_AuthHandler_Guzzle5AuthHandler", "fromLink": "Google_AuthHandler_Guzzle5AuthHandler.html", "link": "Google_AuthHandler_Guzzle5AuthHandler.html#method_attachKey", "name": "Google_AuthHandler_Guzzle5AuthHandler::attachKey", "doc": "&quot;&quot;"},
            
            {"type": "Class",  "link": "Google_AuthHandler_Guzzle6AuthHandler.html", "name": "Google_AuthHandler_Guzzle6AuthHandler", "doc": "&quot;&quot;"},
                                                        {"type": "Method", "fromName": "Google_AuthHandler_Guzzle6AuthHandler", "fromLink": "Google_AuthHandler_Guzzle6AuthHandler.html", "link": "Google_AuthHandler_Guzzle6AuthHandler.html#method___construct", "name": "Google_AuthHandler_Guzzle6AuthHandler::__construct", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Google_AuthHandler_Guzzle6AuthHandler", "fromLink": "Google_AuthHandler_Guzzle6AuthHandler.html", "link": "Google_AuthHandler_Guzzle6AuthHandler.html#method_attachCredentials", "name": "Google_AuthHandler_Guzzle6AuthHandler::attachCredentials", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Google_AuthHandler_Guzzle6AuthHandler", "fromLink": "Google_AuthHandler_Guzzle6AuthHandler.html", "link": "Google_AuthHandler_Guzzle6AuthHandler.html#method_attachToken", "name": "Google_AuthHandler_Guzzle6AuthHandler::attachToken", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Google_AuthHandler_Guzzle6AuthHandler", "fromLink": "Google_AuthHandler_Guzzle6AuthHandler.html", "link": "Google_AuthHandler_Guzzle6AuthHandler.html#method_attachKey", "name": "Google_AuthHandler_Guzzle6AuthHandler::attachKey", "doc": "&quot;&quot;"},
            
            {"type": "Class",  "link": "Google_Client.html", "name": "Google_Client", "doc": "&quot;The Google API Client\nhttps:\/\/github.com\/google\/google-api-php-client&quot;"},
                                                        {"type": "Method", "fromName": "Google_Client", "fromLink": "Google_Client.html", "link": "Google_Client.html#method___construct", "name": "Google_Client::__construct", "doc": "&quot;Construct the Google Client.&quot;"},
                    {"type": "Method", "fromName": "Google_Client", "fromLink": "Google_Client.html", "link": "Google_Client.html#method_getLibraryVersion", "name": "Google_Client::getLibraryVersion", "doc": "&quot;Get a string containing the version of the library.&quot;"},
                    {"type": "Method", "fromName": "Google_Client", "fromLink": "Google_Client.html", "link": "Google_Client.html#method_authenticate", "name": "Google_Client::authenticate", "doc": "&quot;For backwards compatibility\nalias for fetchAccessTokenWithAuthCode&quot;"},
                    {"type": "Method", "fromName": "Google_Client", "fromLink": "Google_Client.html", "link": "Google_Client.html#method_fetchAccessTokenWithAuthCode", "name": "Google_Client::fetchAccessTokenWithAuthCode", "doc": "&quot;Attempt to exchange a code for an valid authentication token.&quot;"},
                    {"type": "Method", "fromName": "Google_Client", "fromLink": "Google_Client.html", "link": "Google_Client.html#method_refreshTokenWithAssertion", "name": "Google_Client::refreshTokenWithAssertion", "doc": "&quot;For backwards compatibility\nalias for fetchAccessTokenWithAssertion&quot;"},
                    {"type": "Method", "fromName": "Google_Client", "fromLink": "Google_Client.html", "link": "Google_Client.html#method_fetchAccessTokenWithAssertion", "name": "Google_Client::fetchAccessTokenWithAssertion", "doc": "&quot;Fetches a fresh access token with a given assertion token.&quot;"},
                    {"type": "Method", "fromName": "Google_Client", "fromLink": "Google_Client.html", "link": "Google_Client.html#method_refreshToken", "name": "Google_Client::refreshToken", "doc": "&quot;For backwards compatibility\nalias for fetchAccessTokenWithRefreshToken&quot;"},
                    {"type": "Method", "fromName": "Google_Client", "fromLink": "Google_Client.html", "link": "Google_Client.html#method_fetchAccessTokenWithRefreshToken", "name": "Google_Client::fetchAccessTokenWithRefreshToken", "doc": "&quot;Fetches a fresh OAuth 2.0 access token with the given refresh token.&quot;"},
                    {"type": "Method", "fromName": "Google_Client", "fromLink": "Google_Client.html", "link": "Google_Client.html#method_createAuthUrl", "name": "Google_Client::createAuthUrl", "doc": "&quot;Create a URL to obtain user authorization.&quot;"},
                    {"type": "Method", "fromName": "Google_Client", "fromLink": "Google_Client.html", "link": "Google_Client.html#method_authorize", "name": "Google_Client::authorize", "doc": "&quot;Adds auth listeners to the HTTP client based on the credentials\nset in the Google API Client object&quot;"},
                    {"type": "Method", "fromName": "Google_Client", "fromLink": "Google_Client.html", "link": "Google_Client.html#method_useApplicationDefaultCredentials", "name": "Google_Client::useApplicationDefaultCredentials", "doc": "&quot;Set the configuration to use application default credentials for\nauthentication&quot;"},
                    {"type": "Method", "fromName": "Google_Client", "fromLink": "Google_Client.html", "link": "Google_Client.html#method_isUsingApplicationDefaultCredentials", "name": "Google_Client::isUsingApplicationDefaultCredentials", "doc": "&quot;To prevent useApplicationDefaultCredentials from inappropriately being\ncalled in a conditional&quot;"},
                    {"type": "Method", "fromName": "Google_Client", "fromLink": "Google_Client.html", "link": "Google_Client.html#method_setAccessToken", "name": "Google_Client::setAccessToken", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Google_Client", "fromLink": "Google_Client.html", "link": "Google_Client.html#method_getAccessToken", "name": "Google_Client::getAccessToken", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Google_Client", "fromLink": "Google_Client.html", "link": "Google_Client.html#method_getRefreshToken", "name": "Google_Client::getRefreshToken", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Google_Client", "fromLink": "Google_Client.html", "link": "Google_Client.html#method_isAccessTokenExpired", "name": "Google_Client::isAccessTokenExpired", "doc": "&quot;Returns if the access_token is expired.&quot;"},
                    {"type": "Method", "fromName": "Google_Client", "fromLink": "Google_Client.html", "link": "Google_Client.html#method_getAuth", "name": "Google_Client::getAuth", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Google_Client", "fromLink": "Google_Client.html", "link": "Google_Client.html#method_setAuth", "name": "Google_Client::setAuth", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Google_Client", "fromLink": "Google_Client.html", "link": "Google_Client.html#method_setClientId", "name": "Google_Client::setClientId", "doc": "&quot;Set the OAuth 2.0 Client ID.&quot;"},
                    {"type": "Method", "fromName": "Google_Client", "fromLink": "Google_Client.html", "link": "Google_Client.html#method_getClientId", "name": "Google_Client::getClientId", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Google_Client", "fromLink": "Google_Client.html", "link": "Google_Client.html#method_setClientSecret", "name": "Google_Client::setClientSecret", "doc": "&quot;Set the OAuth 2.0 Client Secret.&quot;"},
                    {"type": "Method", "fromName": "Google_Client", "fromLink": "Google_Client.html", "link": "Google_Client.html#method_getClientSecret", "name": "Google_Client::getClientSecret", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Google_Client", "fromLink": "Google_Client.html", "link": "Google_Client.html#method_setRedirectUri", "name": "Google_Client::setRedirectUri", "doc": "&quot;Set the OAuth 2.0 Redirect URI.&quot;"},
                    {"type": "Method", "fromName": "Google_Client", "fromLink": "Google_Client.html", "link": "Google_Client.html#method_getRedirectUri", "name": "Google_Client::getRedirectUri", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Google_Client", "fromLink": "Google_Client.html", "link": "Google_Client.html#method_setState", "name": "Google_Client::setState", "doc": "&quot;Set OAuth 2.0 \&quot;state\&quot; parameter to achieve per-request customization.&quot;"},
                    {"type": "Method", "fromName": "Google_Client", "fromLink": "Google_Client.html", "link": "Google_Client.html#method_setAccessType", "name": "Google_Client::setAccessType", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Google_Client", "fromLink": "Google_Client.html", "link": "Google_Client.html#method_setApprovalPrompt", "name": "Google_Client::setApprovalPrompt", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Google_Client", "fromLink": "Google_Client.html", "link": "Google_Client.html#method_setLoginHint", "name": "Google_Client::setLoginHint", "doc": "&quot;Set the login hint, email address or sub id.&quot;"},
                    {"type": "Method", "fromName": "Google_Client", "fromLink": "Google_Client.html", "link": "Google_Client.html#method_setApplicationName", "name": "Google_Client::setApplicationName", "doc": "&quot;Set the application name, this is included in the User-Agent HTTP header.&quot;"},
                    {"type": "Method", "fromName": "Google_Client", "fromLink": "Google_Client.html", "link": "Google_Client.html#method_setRequestVisibleActions", "name": "Google_Client::setRequestVisibleActions", "doc": "&quot;If &#039;plus.login&#039; is included in the list of requested scopes, you can use\nthis method to define types of app activities that your app will write.&quot;"},
                    {"type": "Method", "fromName": "Google_Client", "fromLink": "Google_Client.html", "link": "Google_Client.html#method_setDeveloperKey", "name": "Google_Client::setDeveloperKey", "doc": "&quot;Set the developer key to use, these are obtained through the API Console.&quot;"},
                    {"type": "Method", "fromName": "Google_Client", "fromLink": "Google_Client.html", "link": "Google_Client.html#method_setHostedDomain", "name": "Google_Client::setHostedDomain", "doc": "&quot;Set the hd (hosted domain) parameter streamlines the login process for\nGoogle Apps hosted accounts. By including the domain of the user, you\nrestrict sign-in to accounts at that domain.&quot;"},
                    {"type": "Method", "fromName": "Google_Client", "fromLink": "Google_Client.html", "link": "Google_Client.html#method_setPrompt", "name": "Google_Client::setPrompt", "doc": "&quot;Set the prompt hint. Valid values are none, consent and select_account.&quot;"},
                    {"type": "Method", "fromName": "Google_Client", "fromLink": "Google_Client.html", "link": "Google_Client.html#method_setOpenidRealm", "name": "Google_Client::setOpenidRealm", "doc": "&quot;openid.realm is a parameter from the OpenID 2.0 protocol, not from OAuth\n2.0. It is used in OpenID 2.0 requests to signify the URL-space for which\nan authentication request is valid.&quot;"},
                    {"type": "Method", "fromName": "Google_Client", "fromLink": "Google_Client.html", "link": "Google_Client.html#method_setIncludeGrantedScopes", "name": "Google_Client::setIncludeGrantedScopes", "doc": "&quot;If this is provided with the value true, and the authorization request is\ngranted, the authorization will include any previous authorizations\ngranted to this user\/application combination for other scopes.&quot;"},
                    {"type": "Method", "fromName": "Google_Client", "fromLink": "Google_Client.html", "link": "Google_Client.html#method_setTokenCallback", "name": "Google_Client::setTokenCallback", "doc": "&quot;sets function to be called when an access token is fetched&quot;"},
                    {"type": "Method", "fromName": "Google_Client", "fromLink": "Google_Client.html", "link": "Google_Client.html#method_revokeToken", "name": "Google_Client::revokeToken", "doc": "&quot;Revoke an OAuth2 access token or refresh token. This method will revoke the current access\ntoken, if a token isn&#039;t provided.&quot;"},
                    {"type": "Method", "fromName": "Google_Client", "fromLink": "Google_Client.html", "link": "Google_Client.html#method_verifyIdToken", "name": "Google_Client::verifyIdToken", "doc": "&quot;Verify an id_token. This method will verify the current id_token, if one\nisn&#039;t provided.&quot;"},
                    {"type": "Method", "fromName": "Google_Client", "fromLink": "Google_Client.html", "link": "Google_Client.html#method_setScopes", "name": "Google_Client::setScopes", "doc": "&quot;Set the scopes to be requested. Must be called before createAuthUrl().&quot;"},
                    {"type": "Method", "fromName": "Google_Client", "fromLink": "Google_Client.html", "link": "Google_Client.html#method_addScope", "name": "Google_Client::addScope", "doc": "&quot;This functions adds a scope to be requested as part of the OAuth2.0 flow.&quot;"},
                    {"type": "Method", "fromName": "Google_Client", "fromLink": "Google_Client.html", "link": "Google_Client.html#method_getScopes", "name": "Google_Client::getScopes", "doc": "&quot;Returns the list of scopes requested by the client&quot;"},
                    {"type": "Method", "fromName": "Google_Client", "fromLink": "Google_Client.html", "link": "Google_Client.html#method_prepareScopes", "name": "Google_Client::prepareScopes", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Google_Client", "fromLink": "Google_Client.html", "link": "Google_Client.html#method_execute", "name": "Google_Client::execute", "doc": "&quot;Helper method to execute deferred HTTP requests.&quot;"},
                    {"type": "Method", "fromName": "Google_Client", "fromLink": "Google_Client.html", "link": "Google_Client.html#method_setUseBatch", "name": "Google_Client::setUseBatch", "doc": "&quot;Declare whether batch calls should be used. This may increase throughput\nby making multiple requests in one connection.&quot;"},
                    {"type": "Method", "fromName": "Google_Client", "fromLink": "Google_Client.html", "link": "Google_Client.html#method_isAppEngine", "name": "Google_Client::isAppEngine", "doc": "&quot;Are we running in Google AppEngine?\nreturn bool&quot;"},
                    {"type": "Method", "fromName": "Google_Client", "fromLink": "Google_Client.html", "link": "Google_Client.html#method_setConfig", "name": "Google_Client::setConfig", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Google_Client", "fromLink": "Google_Client.html", "link": "Google_Client.html#method_getConfig", "name": "Google_Client::getConfig", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Google_Client", "fromLink": "Google_Client.html", "link": "Google_Client.html#method_setAuthConfigFile", "name": "Google_Client::setAuthConfigFile", "doc": "&quot;For backwards compatibility\nalias for setAuthConfig&quot;"},
                    {"type": "Method", "fromName": "Google_Client", "fromLink": "Google_Client.html", "link": "Google_Client.html#method_setAuthConfig", "name": "Google_Client::setAuthConfig", "doc": "&quot;Set the auth config from new or deprecated JSON config.&quot;"},
                    {"type": "Method", "fromName": "Google_Client", "fromLink": "Google_Client.html", "link": "Google_Client.html#method_setSubject", "name": "Google_Client::setSubject", "doc": "&quot;Use when the service account has been delegated domain wide access.&quot;"},
                    {"type": "Method", "fromName": "Google_Client", "fromLink": "Google_Client.html", "link": "Google_Client.html#method_setDefer", "name": "Google_Client::setDefer", "doc": "&quot;Declare whether making API calls should make the call immediately, or\nreturn a request which can be called with -&gt;execute();&quot;"},
                    {"type": "Method", "fromName": "Google_Client", "fromLink": "Google_Client.html", "link": "Google_Client.html#method_shouldDefer", "name": "Google_Client::shouldDefer", "doc": "&quot;Whether or not to return raw requests&quot;"},
                    {"type": "Method", "fromName": "Google_Client", "fromLink": "Google_Client.html", "link": "Google_Client.html#method_getOAuth2Service", "name": "Google_Client::getOAuth2Service", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Google_Client", "fromLink": "Google_Client.html", "link": "Google_Client.html#method_createOAuth2Service", "name": "Google_Client::createOAuth2Service", "doc": "&quot;create a default google auth object&quot;"},
                    {"type": "Method", "fromName": "Google_Client", "fromLink": "Google_Client.html", "link": "Google_Client.html#method_setCache", "name": "Google_Client::setCache", "doc": "&quot;Set the Cache object&quot;"},
                    {"type": "Method", "fromName": "Google_Client", "fromLink": "Google_Client.html", "link": "Google_Client.html#method_getCache", "name": "Google_Client::getCache", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Google_Client", "fromLink": "Google_Client.html", "link": "Google_Client.html#method_setCacheConfig", "name": "Google_Client::setCacheConfig", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Google_Client", "fromLink": "Google_Client.html", "link": "Google_Client.html#method_setLogger", "name": "Google_Client::setLogger", "doc": "&quot;Set the Logger object&quot;"},
                    {"type": "Method", "fromName": "Google_Client", "fromLink": "Google_Client.html", "link": "Google_Client.html#method_getLogger", "name": "Google_Client::getLogger", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Google_Client", "fromLink": "Google_Client.html", "link": "Google_Client.html#method_createDefaultLogger", "name": "Google_Client::createDefaultLogger", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Google_Client", "fromLink": "Google_Client.html", "link": "Google_Client.html#method_createDefaultCache", "name": "Google_Client::createDefaultCache", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Google_Client", "fromLink": "Google_Client.html", "link": "Google_Client.html#method_setHttpClient", "name": "Google_Client::setHttpClient", "doc": "&quot;Set the Http Client object&quot;"},
                    {"type": "Method", "fromName": "Google_Client", "fromLink": "Google_Client.html", "link": "Google_Client.html#method_getHttpClient", "name": "Google_Client::getHttpClient", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Google_Client", "fromLink": "Google_Client.html", "link": "Google_Client.html#method_createDefaultHttpClient", "name": "Google_Client::createDefaultHttpClient", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Google_Client", "fromLink": "Google_Client.html", "link": "Google_Client.html#method_getAuthHandler", "name": "Google_Client::getAuthHandler", "doc": "&quot;&quot;"},
            
            {"type": "Class",  "link": "Google_Collection.html", "name": "Google_Collection", "doc": "&quot;Extension to the regular Google_Model that automatically\nexposes the items array for iteration, so you can just\niterate over the object rather than a reference inside.&quot;"},
                                                        {"type": "Method", "fromName": "Google_Collection", "fromLink": "Google_Collection.html", "link": "Google_Collection.html#method_rewind", "name": "Google_Collection::rewind", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Google_Collection", "fromLink": "Google_Collection.html", "link": "Google_Collection.html#method_current", "name": "Google_Collection::current", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Google_Collection", "fromLink": "Google_Collection.html", "link": "Google_Collection.html#method_key", "name": "Google_Collection::key", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Google_Collection", "fromLink": "Google_Collection.html", "link": "Google_Collection.html#method_next", "name": "Google_Collection::next", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Google_Collection", "fromLink": "Google_Collection.html", "link": "Google_Collection.html#method_valid", "name": "Google_Collection::valid", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Google_Collection", "fromLink": "Google_Collection.html", "link": "Google_Collection.html#method_count", "name": "Google_Collection::count", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Google_Collection", "fromLink": "Google_Collection.html", "link": "Google_Collection.html#method_offsetExists", "name": "Google_Collection::offsetExists", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Google_Collection", "fromLink": "Google_Collection.html", "link": "Google_Collection.html#method_offsetGet", "name": "Google_Collection::offsetGet", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Google_Collection", "fromLink": "Google_Collection.html", "link": "Google_Collection.html#method_offsetSet", "name": "Google_Collection::offsetSet", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Google_Collection", "fromLink": "Google_Collection.html", "link": "Google_Collection.html#method_offsetUnset", "name": "Google_Collection::offsetUnset", "doc": "&quot;&quot;"},
            
            {"type": "Class",  "link": "Google_Exception.html", "name": "Google_Exception", "doc": "&quot;&quot;"},
                    
            {"type": "Class",  "link": "Google_Http_Batch.html", "name": "Google_Http_Batch", "doc": "&quot;Class to handle batched requests to the Google API service.&quot;"},
                                                        {"type": "Method", "fromName": "Google_Http_Batch", "fromLink": "Google_Http_Batch.html", "link": "Google_Http_Batch.html#method___construct", "name": "Google_Http_Batch::__construct", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Google_Http_Batch", "fromLink": "Google_Http_Batch.html", "link": "Google_Http_Batch.html#method_add", "name": "Google_Http_Batch::add", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Google_Http_Batch", "fromLink": "Google_Http_Batch.html", "link": "Google_Http_Batch.html#method_execute", "name": "Google_Http_Batch::execute", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Google_Http_Batch", "fromLink": "Google_Http_Batch.html", "link": "Google_Http_Batch.html#method_parseResponse", "name": "Google_Http_Batch::parseResponse", "doc": "&quot;&quot;"},
            
            {"type": "Class",  "link": "Google_Http_MediaFileUpload.html", "name": "Google_Http_MediaFileUpload", "doc": "&quot;Manage large file uploads, which may be media but can be any type\nof sizable data.&quot;"},
                                                        {"type": "Method", "fromName": "Google_Http_MediaFileUpload", "fromLink": "Google_Http_MediaFileUpload.html", "link": "Google_Http_MediaFileUpload.html#method___construct", "name": "Google_Http_MediaFileUpload::__construct", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Google_Http_MediaFileUpload", "fromLink": "Google_Http_MediaFileUpload.html", "link": "Google_Http_MediaFileUpload.html#method_setFileSize", "name": "Google_Http_MediaFileUpload::setFileSize", "doc": "&quot;Set the size of the file that is being uploaded.&quot;"},
                    {"type": "Method", "fromName": "Google_Http_MediaFileUpload", "fromLink": "Google_Http_MediaFileUpload.html", "link": "Google_Http_MediaFileUpload.html#method_getProgress", "name": "Google_Http_MediaFileUpload::getProgress", "doc": "&quot;Return the progress on the upload&quot;"},
                    {"type": "Method", "fromName": "Google_Http_MediaFileUpload", "fromLink": "Google_Http_MediaFileUpload.html", "link": "Google_Http_MediaFileUpload.html#method_nextChunk", "name": "Google_Http_MediaFileUpload::nextChunk", "doc": "&quot;Send the next part of the file to upload.&quot;"},
                    {"type": "Method", "fromName": "Google_Http_MediaFileUpload", "fromLink": "Google_Http_MediaFileUpload.html", "link": "Google_Http_MediaFileUpload.html#method_getHttpResultCode", "name": "Google_Http_MediaFileUpload::getHttpResultCode", "doc": "&quot;Return the HTTP result code from the last call made.&quot;"},
                    {"type": "Method", "fromName": "Google_Http_MediaFileUpload", "fromLink": "Google_Http_MediaFileUpload.html", "link": "Google_Http_MediaFileUpload.html#method_resume", "name": "Google_Http_MediaFileUpload::resume", "doc": "&quot;Resume a previously unfinished upload&quot;"},
                    {"type": "Method", "fromName": "Google_Http_MediaFileUpload", "fromLink": "Google_Http_MediaFileUpload.html", "link": "Google_Http_MediaFileUpload.html#method_getUploadType", "name": "Google_Http_MediaFileUpload::getUploadType", "doc": "&quot;Valid upload types:\n- resumable (UPLOAD_RESUMABLE_TYPE)\n- media (UPLOAD_MEDIA_TYPE)\n- multipart (UPLOAD_MULTIPART_TYPE)&quot;"},
                    {"type": "Method", "fromName": "Google_Http_MediaFileUpload", "fromLink": "Google_Http_MediaFileUpload.html", "link": "Google_Http_MediaFileUpload.html#method_getResumeUri", "name": "Google_Http_MediaFileUpload::getResumeUri", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Google_Http_MediaFileUpload", "fromLink": "Google_Http_MediaFileUpload.html", "link": "Google_Http_MediaFileUpload.html#method_setChunkSize", "name": "Google_Http_MediaFileUpload::setChunkSize", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Google_Http_MediaFileUpload", "fromLink": "Google_Http_MediaFileUpload.html", "link": "Google_Http_MediaFileUpload.html#method_getRequest", "name": "Google_Http_MediaFileUpload::getRequest", "doc": "&quot;&quot;"},
            
            {"type": "Class",  "link": "Google_Http_REST.html", "name": "Google_Http_REST", "doc": "&quot;This class implements the RESTful transport of apiServiceRequest()&#039;s&quot;"},
                                                        {"type": "Method", "fromName": "Google_Http_REST", "fromLink": "Google_Http_REST.html", "link": "Google_Http_REST.html#method_execute", "name": "Google_Http_REST::execute", "doc": "&quot;Executes a Psr\\Http\\Message\\RequestInterface and (if applicable) automatically retries\nwhen errors occur.&quot;"},
                    {"type": "Method", "fromName": "Google_Http_REST", "fromLink": "Google_Http_REST.html", "link": "Google_Http_REST.html#method_doExecute", "name": "Google_Http_REST::doExecute", "doc": "&quot;Executes a Psr\\Http\\Message\\RequestInterface&quot;"},
                    {"type": "Method", "fromName": "Google_Http_REST", "fromLink": "Google_Http_REST.html", "link": "Google_Http_REST.html#method_decodeHttpResponse", "name": "Google_Http_REST::decodeHttpResponse", "doc": "&quot;Decode an HTTP Response.&quot;"},
            
            {"type": "Class",  "link": "Google_Model.html", "name": "Google_Model", "doc": "&quot;This class defines attributes, valid values, and usage which is generated\nfrom a given json schema.&quot;"},
                                                        {"type": "Method", "fromName": "Google_Model", "fromLink": "Google_Model.html", "link": "Google_Model.html#method___construct", "name": "Google_Model::__construct", "doc": "&quot;Polymorphic - accepts a variable number of arguments dependent\non the type of the model subclass.&quot;"},
                    {"type": "Method", "fromName": "Google_Model", "fromLink": "Google_Model.html", "link": "Google_Model.html#method___get", "name": "Google_Model::__get", "doc": "&quot;Getter that handles passthrough access to the data array, and lazy object creation.&quot;"},
                    {"type": "Method", "fromName": "Google_Model", "fromLink": "Google_Model.html", "link": "Google_Model.html#method_mapTypes", "name": "Google_Model::mapTypes", "doc": "&quot;Initialize this object&#039;s properties from an array.&quot;"},
                    {"type": "Method", "fromName": "Google_Model", "fromLink": "Google_Model.html", "link": "Google_Model.html#method_gapiInit", "name": "Google_Model::gapiInit", "doc": "&quot;Blank initialiser to be used in subclasses to do  post-construction initialisation - this\navoids the need for subclasses to have to implement the variadics handling in their\nconstructors.&quot;"},
                    {"type": "Method", "fromName": "Google_Model", "fromLink": "Google_Model.html", "link": "Google_Model.html#method_toSimpleObject", "name": "Google_Model::toSimpleObject", "doc": "&quot;Create a simplified object suitable for straightforward\nconversion to JSON. This is relatively expensive\ndue to the usage of reflection, but shouldn&#039;t be called\na whole lot, and is the most straightforward way to filter.&quot;"},
                    {"type": "Method", "fromName": "Google_Model", "fromLink": "Google_Model.html", "link": "Google_Model.html#method_isAssociativeArray", "name": "Google_Model::isAssociativeArray", "doc": "&quot;Returns true only if the array is associative.&quot;"},
                    {"type": "Method", "fromName": "Google_Model", "fromLink": "Google_Model.html", "link": "Google_Model.html#method_assertIsArray", "name": "Google_Model::assertIsArray", "doc": "&quot;Verify if $obj is an array.&quot;"},
                    {"type": "Method", "fromName": "Google_Model", "fromLink": "Google_Model.html", "link": "Google_Model.html#method_offsetExists", "name": "Google_Model::offsetExists", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Google_Model", "fromLink": "Google_Model.html", "link": "Google_Model.html#method_offsetGet", "name": "Google_Model::offsetGet", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Google_Model", "fromLink": "Google_Model.html", "link": "Google_Model.html#method_offsetSet", "name": "Google_Model::offsetSet", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Google_Model", "fromLink": "Google_Model.html", "link": "Google_Model.html#method_offsetUnset", "name": "Google_Model::offsetUnset", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Google_Model", "fromLink": "Google_Model.html", "link": "Google_Model.html#method_keyType", "name": "Google_Model::keyType", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Google_Model", "fromLink": "Google_Model.html", "link": "Google_Model.html#method_dataType", "name": "Google_Model::dataType", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Google_Model", "fromLink": "Google_Model.html", "link": "Google_Model.html#method___isset", "name": "Google_Model::__isset", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Google_Model", "fromLink": "Google_Model.html", "link": "Google_Model.html#method___unset", "name": "Google_Model::__unset", "doc": "&quot;&quot;"},
            
            {"type": "Class",  "link": "Google_Service.html", "name": "Google_Service", "doc": "&quot;&quot;"},
                                                        {"type": "Method", "fromName": "Google_Service", "fromLink": "Google_Service.html", "link": "Google_Service.html#method___construct", "name": "Google_Service::__construct", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Google_Service", "fromLink": "Google_Service.html", "link": "Google_Service.html#method_getClient", "name": "Google_Service::getClient", "doc": "&quot;Return the associated Google_Client class.&quot;"},
                    {"type": "Method", "fromName": "Google_Service", "fromLink": "Google_Service.html", "link": "Google_Service.html#method_createBatch", "name": "Google_Service::createBatch", "doc": "&quot;Create a new HTTP Batch handler for this service&quot;"},
            
            {"type": "Class",  "link": "Google_Service_Exception.html", "name": "Google_Service_Exception", "doc": "&quot;&quot;"},
                                                        {"type": "Method", "fromName": "Google_Service_Exception", "fromLink": "Google_Service_Exception.html", "link": "Google_Service_Exception.html#method___construct", "name": "Google_Service_Exception::__construct", "doc": "&quot;Override default constructor to add the ability to set $errors and a retry\nmap.&quot;"},
                    {"type": "Method", "fromName": "Google_Service_Exception", "fromLink": "Google_Service_Exception.html", "link": "Google_Service_Exception.html#method_getErrors", "name": "Google_Service_Exception::getErrors", "doc": "&quot;An example of the possible errors returned.&quot;"},
            
            {"type": "Class",  "link": "Google_Service_Resource.html", "name": "Google_Service_Resource", "doc": "&quot;Implements the actual methods\/resources of the discovered Google API using magic function\ncalling overloading (__call()), which on call will see if the method name (plus.activities.list)\nis available in this service, and if so construct an apiHttpRequest representing it.&quot;"},
                                                        {"type": "Method", "fromName": "Google_Service_Resource", "fromLink": "Google_Service_Resource.html", "link": "Google_Service_Resource.html#method___construct", "name": "Google_Service_Resource::__construct", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Google_Service_Resource", "fromLink": "Google_Service_Resource.html", "link": "Google_Service_Resource.html#method_call", "name": "Google_Service_Resource::call", "doc": "&quot;TODO: This function needs simplifying.&quot;"},
                    {"type": "Method", "fromName": "Google_Service_Resource", "fromLink": "Google_Service_Resource.html", "link": "Google_Service_Resource.html#method_convertToArrayAndStripNulls", "name": "Google_Service_Resource::convertToArrayAndStripNulls", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Google_Service_Resource", "fromLink": "Google_Service_Resource.html", "link": "Google_Service_Resource.html#method_createRequestUri", "name": "Google_Service_Resource::createRequestUri", "doc": "&quot;Parse\/expand request parameters and create a fully qualified\nrequest uri.&quot;"},
            
            {"type": "Class",  "link": "Google_Task_Exception.html", "name": "Google_Task_Exception", "doc": "&quot;&quot;"},
                    
            {"type": "Class",  "link": "Google_Task_Retryable.html", "name": "Google_Task_Retryable", "doc": "&quot;Interface for checking how many times a given task can be retried following\na failure.&quot;"},
                    
            {"type": "Class",  "link": "Google_Task_Runner.html", "name": "Google_Task_Runner", "doc": "&quot;A task runner with exponential backoff support.&quot;"},
                                                        {"type": "Method", "fromName": "Google_Task_Runner", "fromLink": "Google_Task_Runner.html", "link": "Google_Task_Runner.html#method___construct", "name": "Google_Task_Runner::__construct", "doc": "&quot;Creates a new task runner with exponential backoff support.&quot;"},
                    {"type": "Method", "fromName": "Google_Task_Runner", "fromLink": "Google_Task_Runner.html", "link": "Google_Task_Runner.html#method_canAttempt", "name": "Google_Task_Runner::canAttempt", "doc": "&quot;Checks if a retry can be attempted.&quot;"},
                    {"type": "Method", "fromName": "Google_Task_Runner", "fromLink": "Google_Task_Runner.html", "link": "Google_Task_Runner.html#method_run", "name": "Google_Task_Runner::run", "doc": "&quot;Runs the task and (if applicable) automatically retries when errors occur.&quot;"},
                    {"type": "Method", "fromName": "Google_Task_Runner", "fromLink": "Google_Task_Runner.html", "link": "Google_Task_Runner.html#method_attempt", "name": "Google_Task_Runner::attempt", "doc": "&quot;Runs a task once, if possible. This is useful for bypassing the &lt;code&gt;run()&lt;\/code&gt;\nloop.&quot;"},
                    {"type": "Method", "fromName": "Google_Task_Runner", "fromLink": "Google_Task_Runner.html", "link": "Google_Task_Runner.html#method_allowedRetries", "name": "Google_Task_Runner::allowedRetries", "doc": "&quot;Gets the number of times the associated task can be retried.&quot;"},
                    {"type": "Method", "fromName": "Google_Task_Runner", "fromLink": "Google_Task_Runner.html", "link": "Google_Task_Runner.html#method_setRetryMap", "name": "Google_Task_Runner::setRetryMap", "doc": "&quot;&quot;"},
            
            {"type": "Class",  "link": "Google_Utils_UriTemplate.html", "name": "Google_Utils_UriTemplate", "doc": "&quot;Implementation of levels 1-3 of the URI Template spec.&quot;"},
                                                        {"type": "Method", "fromName": "Google_Utils_UriTemplate", "fromLink": "Google_Utils_UriTemplate.html", "link": "Google_Utils_UriTemplate.html#method_parse", "name": "Google_Utils_UriTemplate::parse", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Google_Utils_UriTemplate", "fromLink": "Google_Utils_UriTemplate.html", "link": "Google_Utils_UriTemplate.html#method_combine", "name": "Google_Utils_UriTemplate::combine", "doc": "&quot;&quot;"},
            
            
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



# Standard Parameters

Many API methods include support for certain optional parameters. In addition to these there are several standard parameters that can be applied to any API call. These are defined in the `Google\Service\Resource` class.

## Parameters

- **alt**: Specify an alternative response type, for example csv.
- **fields**: A comma separated list of fields that should be included in the response. Nested parameters can be specified with parens, e.g. key,parent(child/subsection).
- **userIp**: The IP of the end-user making the request. This is used in per-user request quotas, as defined in the Google Developers Console
- **quotaUser**: A user ID for the end user, an alternative to userIp for applying per-user request quotas
- **data**: Used as part of [media](media.md)
- **mimeType**: Used as part of [media](media.md)
- **uploadType**: Used as part of [media](media.md)
- **mediaUpload**: Used as part of [media](media.md)
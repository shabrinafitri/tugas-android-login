package com.example.shabrinafitri.androidlogin.apihelper;

/**
 * Created by shabrinafitri on 27/05/18.
 */

public class UtilsApi {
    public static final String BASE_URL_API = "#";

    public static BaseApiService getAPIService(){
        return
                RetrofitClient.getClient(BASE_URL_API).create(BaseApiService.class);
    }
}

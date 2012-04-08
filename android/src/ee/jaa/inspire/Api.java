package ee.jaa.inspire;

import org.apache.http.HttpEntity;
import org.apache.http.HttpResponse;
import org.apache.http.client.HttpClient;
import org.apache.http.client.methods.HttpGet;
import org.apache.http.impl.client.DefaultHttpClient;
import org.apache.http.util.EntityUtils;
import org.json.JSONObject;

public class Api {


	/**
	 * The API URI of Inspire
	 */
	private final String API_URI = "http://localhost/inspire/";

	

	/**
	 * Full JSON response to the last query
	 */
	private JSONObject _response;

	/**
	 * HTTP status code response
	 */
	public int status = 500;

	/**
	 * Current request URI
	 */
	private String uri;
	
	/**
	 * Add a param to the current URI
	 * 
	 * @param key
	 * @param value
	 */
	public void addParam(String key, String value) {
		if (uri.indexOf("?") == -1) {
			uri += "?";
		} else {
			uri += "&";
		}
		uri += key+"="+value;
	}
	
	/**
	 * Execute an API query against the current URI
	 * 
	 * @return 
	 */
	public String execute() {

		// Assume error by default
		status = 500;

		try {
			HttpClient client = new DefaultHttpClient();

			HttpGet get = new HttpGet(API_URI+uri);
			HttpResponse responseGet = client.execute(get);
			HttpEntity resEntityGet = responseGet.getEntity();
			if (resEntityGet != null) {

				// The response body
				String response = EntityUtils.toString(resEntityGet);

				// Save as JSON
				_response = new JSONObject(response);

				status = Integer.parseInt(_response.getString("status"));
				uri = null;
				return response;
			}
		} catch (Exception e) {
			return "Error";
		}
		return "Error";
	}

}

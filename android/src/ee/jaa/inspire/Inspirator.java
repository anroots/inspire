package ee.jaa.inspire;

import org.apache.http.HttpEntity;
import org.apache.http.HttpResponse;
import org.apache.http.client.HttpClient;
import org.apache.http.client.methods.HttpGet;
import org.apache.http.impl.client.DefaultHttpClient;
import org.apache.http.util.EntityUtils;
import org.json.JSONObject;

/**
 * Represents the Inspire service
 * 
 * @author david
 * 
 */
public class Inspirator {

	/**
	 * The API URI of Inspire
	 */
	private final String API_URI = "http://i.jaa.ee/";

	/**
	 * Last word retrieved from Inspire
	 */
	private String theWord;

	/**
	 * Full JSON response to the last query
	 */
	private JSONObject _response;

	private int _status = 500;

	/**
	 * Whether to use dictionary for words
	 */
	public boolean useDictionary = true;

	private String _apiQuery(String action, String id) {

		_status = 500;

		try {
			HttpClient client = new DefaultHttpClient();
			String getURL = API_URI + action;

			// Use the dict?
			if (useDictionary) {
				getURL += "?use_dictionary=1";
			}

			HttpGet get = new HttpGet(getURL);
			HttpResponse responseGet = client.execute(get);
			HttpEntity resEntityGet = responseGet.getEntity();
			if (resEntityGet != null) {

				// The response body
				String response = EntityUtils.toString(resEntityGet);

				// Save as JSON
				_response = new JSONObject(response);

				theWord = _response.getString("response");

				_status = Integer.parseInt(_response.getString("status"));
				return response;
			}
		} catch (Exception e) {
			return "Error";
		}
		return "Error";
	}

	public String inspire() {
		_apiQuery("word/inspire", null);

		if (_status == 200) {
			return theWord;
		} else {
			return "Error, sorry!";
		}
	}
}

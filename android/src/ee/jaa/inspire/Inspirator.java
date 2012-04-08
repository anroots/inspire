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
	 * Last word retrieved from Inspire
	 */
	private String theWord;

	/**
	 * Holds the API object
	 */
	private Api api;
	
	public void Inspirator() {
		api = new Api();
	}
	
	/**
	 * Whether to use dictionary for words
	 */
	public boolean useDictionary = true;

	/**
	 * The current language
	 */
	public String lang = "en";
	
	public String inspire() {
		
		api.addParam("use_dictionary", String.valueOf(useDictionary));
		api.execute();

		if (api.status == 200) {
			return theWord;
		} else {
			return "Error, sorry!";
		}
	}
}

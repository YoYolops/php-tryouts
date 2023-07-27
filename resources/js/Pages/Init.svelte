<script lang="ts">
    import { Api, updateApiConfig } from "../stores/Api";
    import { Session, resetLocallyStoragedData } from "../stores/Session";
    import { router } from "@inertiajs/svelte";

    // Will validate session token, in valid token case, will set headers configuration to $Api
    // otherwise, will send user to home. Important to notice that if a page does not require authentication
    // Init.svelte component should not be entangled to it
    async function validateSessionAndConfigureApi() {
        try {
            const {data: response} = await $Api.get("/validate/session", {
                headers: {
                    Authorization: `Bearer ${$Session.token}`
                }
            });
            updateApiConfig({
                headers: { Authorization: `Bearer ${response.token}` }
            })
        } catch (error) {
            console.error("Init encountered problems while validating session, local storage will be cleared");
            resetLocallyStoragedData();
            router.get("/");
        }
    }

    void async function _init() {
        await validateSessionAndConfigureApi();
    }()
</script>

<slot>

</slot>
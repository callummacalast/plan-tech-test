export async function fetcher<T>(
  url: string,
  params?: Record<string, string>,
  options?: RequestInit
): Promise<T> {
  try {
    const searchParams = new URLSearchParams()

    if (params) {
      Object.entries(params).forEach(([key, value]) => {
        if (value) {
          searchParams.append(key, value)
        }
      })
    }

    const response = await fetch(`${url}?${searchParams?.toString()}`, options)

    if (!response.ok) {
      const errorData = <{ message: string }>await response.json()

      throw new Error(
        errorData.message || `HTTP error! Status: ${response.status}`
      )
    }

    return response.json() as Promise<T>
  } catch (error) {
    console.error('Fetch error:', error)
    throw error
  }
}

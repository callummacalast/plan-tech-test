import { useVideos } from '../hooks/useVideos'

const DataError = () => {
  const { error, setError } = useVideos()

  if (!error) return null

  return (
    <div className="bg-white absolute z-10 top-0 left-0 right-0 bottom-0 overflow-hidden flex justify-center items-center">
      <p>{error}</p>
      <button onClick={() => setError(null)}>Dismiss</button>
    </div>
  )
}

export default DataError

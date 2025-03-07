import React, { useState, useEffect } from 'react'
import { IVideoBase } from '../definitions'
import { fetcher } from '../lib/fetch'
import { VideoContext } from '../contexts/VideoContext'

export const VideoProvider: React.FC<{ children: React.ReactNode }> = ({
  children,
}) => {
  const [videos, setVideos] = useState<IVideoBase[] | null>(null)
  const [error, setError] = useState<string | null>(null)
  const [isLoading, setIsLoading] = useState(false)

  const fetchVideos = async (search?: string) => {
    setIsLoading(true)
    const params: Record<string, string> = {}
    if (search) {
      params.search = search
    }

    try {
      const res: { data: IVideoBase[] } = await fetcher(
        `${import.meta.env.VITE_BACKEND_URL}/videos`,
        params
      )

      setVideos(res.data)

      setTimeout(() => setIsLoading(false), 700)

      setError(null)
    } catch (err) {
      setError('Ooops, failed to load video data')
      setIsLoading(false)
      console.error(err)
    }
  }

  useEffect(() => {
    void fetchVideos()
  }, [])

  return (
    <VideoContext.Provider
      value={{ videos, isLoading, fetchVideos, error, setError, setIsLoading }}
    >
      {children}
    </VideoContext.Provider>
  )
}
